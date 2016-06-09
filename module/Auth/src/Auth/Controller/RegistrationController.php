<?php

namespace Auth\Controller;

use Zend\View\Model\ViewModel;
use Auth\Form\RegistrationFilter;
use Auth\Form\ForgottenPasswordFilter;
use Zend\Mail\Message;
use Zend\Crypt\Key\Derivation\Pbkdf2;

class RegistrationController extends AbstractController {

    public function __construct() {
        $this->route = "auth/default";
        $this->controller = "registration";
        $this->action = "forgotten-password";
        $this->form = "Auth\Form\RegistrationForm";
        $this->model = "Auth\Model\BsUsers";
        $this->table = "Auth\Model\BsUsersTable";
        $this->template = "/auth/auth/listar";
    }

    public function indexAction() {
        // A test instantiation to make sure it works. Not used in the application. You can remove the next line
        // $myValidator = new ConfirmPassword();
        $this->form = $this->getForm();
        $this->form->get('submit')->setValue('Register');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $this->form->setInputFilter(new RegistrationFilter($this->getServiceLocator()));
            $this->form->setData($request->getPost());
            if ($this->form->isValid()) {
                $this->data = $this->form->getData();
                $this->data = $this->prepareData($this->data);
                $auth = $this->getTableGateway();
                $auth->exchangeArray($this->data);
                $this->getTableGateway()->insert($auth);
                $this->sendConfirmationEmail($auth);
                $this->flashMessenger()->addMessage($auth->usr_email);
                return $this->redirect()->toRoute('auth/default', array('controller' => 'registration', 'action' => 'registration-success'));
            }
        }
        return new ViewModel(array('form' => $this->form));
    }

    public function registrationSuccessAction() {
        $usr_email = null;
        $flashMessenger = $this->flashMessenger();
        if ($flashMessenger->hasMessages()) {
            foreach ($flashMessenger->getMessages() as $key => $value) {
                $usr_email .= $value;
            }
        }
        return new ViewModel(array('usr_email' => $usr_email));
    }

    public function confirmEmailAction() {
        $token = $this->params()->fromRoute('id');
        $viewModel = new ViewModel(array('token' => $token));
        try {
            $user = $this->getTableGateway()->getUserByToken($token);
            $usr_id = $user->usr_id;
            $this->getUsersTable()->activateUser($usr_id);
        } catch (\Exception $e) {
            $viewModel->setTemplate('auth/registration/confirm-email-error.phtml');
        }
        return $viewModel;
    }

    public function forgottenPasswordAction() {
        $this->form = 'Auth\Form\ForgottenPasswordForm';
        $this->form = $this->getForm();
        $this->form->get('submit')->setValue('Send');
        $request = $this->getRequest();
        if ($request->isPost()) {
            $this->form->setInputFilter(new ForgottenPasswordFilter($this->getServiceLocator()));
            $this->form->setData($request->getPost());
            if ($this->form->isValid()) {
                $this->data = $this->form->getData();
                $usr_email = $this->data['email'];
                $usersTable = $this->getTableGateway();
                $auth = $usersTable->getUserByEmail($usr_email);
                $password = $this->generatePassword();
                $auth->setPassword($this->encryptPassword($usr_email, $password, $this->getStaticSalt()));
                $usersTable->update($auth);
                $this->sendPasswordByEmail($usr_email, $password);
                $this->flashMessenger()->addMessage($usr_email);
                return $this->redirect()->toRoute('auth/default', array('controller' => 'registration', 'action' => 'password-change-success'));
            }
        }
        return new ViewModel(array('form' => $this->form));
    }

    public function passwordChangeSuccessAction() {
        $usr_email = null;
        $flashMessenger = $this->flashMessenger();
        if ($flashMessenger->hasMessages()) {
            foreach ($flashMessenger->getMessages() as $key => $value) {
                $usr_email .= $value;
            }
        }
        return new ViewModel(array('usr_email' => $usr_email));
    }

    public function sendConfirmationEmail($auth) {
        // $view = $this->getServiceLocator()->get('View');
        $transport = $this->getServiceLocator()->get('mail.transport');
        $message = new Message();
        $this->getRequest()->getServer();  //Server vars
        $message->addTo($auth->usr_email)
                ->addFrom('praktiki@coolcsn.com')
                ->setSubject('Please, confirm your registration!')
                ->setBody("Please, click the link to confirm your registration => " .
                        $this->getRequest()->getServer('HTTP_ORIGIN') .
                        $this->url()->fromRoute('auth/default', array(
                            'controller' => 'registration',
                            'action' => 'confirm-email',
                            'id' => $auth->usr_registration_token)));
        $transport->send($message);
    }

    public function sendPasswordByEmail($usr_email, $password) {
        $transport = $this->getServiceLocator()->get('mail.transport');
        $message = new Message();
        $this->getRequest()->getServer();  //Server vars
        $message->addTo($usr_email)
                ->addFrom('suporte@sigasmart.com.br')
                ->setSubject('Your password has been changed!')
                ->setBody("Your password at  " .
                        $this->getRequest()->getServer('HTTP_ORIGIN') .
                        ' has been changed. Your new password is: ' .
                        $password
        );
        $transport->send($message);
    }
     public function encryptPassword($login, $password) {
        $salt = $this->getStaticSalt();
        return base64_encode(Pbkdf2::calc('sha256', $password, $login, 10000, strlen($salt * 2)));
    }

    public function getStaticSalt() {
        $config = $this->getServiceLocator()->get('Config');
        $staticSalt = $config['static_salt'];
        return $staticSalt;
    }
    
    public function prepareData($data)
	{
		$data['state'] = 1;
		$data['password'] = $this->encriptPassword($data['email'],$data['password']);
		$data['usr_registration_token'] = md5(uniqid(mt_rand(), true)); 
                $data['empresa'] = 1;
                $data['created_by'] = 1;
 		return $data;
	}

    public function generatePassword($l = 8, $c = 0, $n = 0, $s = 0) {
        // get count of all required minimum special chars
        $count = $c + $n + $s;
        $out = '';
        // sanitize inputs; should be self-explanatory
        if (!is_int($l) || !is_int($c) || !is_int($n) || !is_int($s)) {
            trigger_error('Argument(s) not an integer', E_USER_WARNING);
            return false;
        } elseif ($l < 0 || $l > 20 || $c < 0 || $n < 0 || $s < 0) {
            trigger_error('Argument(s) out of range', E_USER_WARNING);
            return false;
        } elseif ($c > $l) {
            trigger_error('Number of password capitals required exceeds password length', E_USER_WARNING);
            return false;
        } elseif ($n > $l) {
            trigger_error('Number of password numerals exceeds password length', E_USER_WARNING);
            return false;
        } elseif ($s > $l) {
            trigger_error('Number of password capitals exceeds password length', E_USER_WARNING);
            return false;
        } elseif ($count > $l) {
            trigger_error('Number of password special characters exceeds specified password length', E_USER_WARNING);
            return false;
        }

        // all inputs clean, proceed to build password
        // change these strings if you want to include or exclude possible password characters
        $chars = "abcdefghijklmnopqrstuvwxyz";
        $caps = strtoupper($chars);
        $nums = "0123456789";
        $syms = "!@#$%^&*()-+?";

        // build the base password of all lower-case letters
        for ($i = 0; $i < $l; $i++) {
            $out .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }

        // create arrays if special character(s) required
        if ($count) {
            // split base password to array; create special chars array
            $tmp1 = str_split($out);
            $tmp2 = array();

            // add required special character(s) to second array
            for ($i = 0; $i < $c; $i++) {
                array_push($tmp2, substr($caps, mt_rand(0, strlen($caps) - 1), 1));
            }
            for ($i = 0; $i < $n; $i++) {
                array_push($tmp2, substr($nums, mt_rand(0, strlen($nums) - 1), 1));
            }
            for ($i = 0; $i < $s; $i++) {
                array_push($tmp2, substr($syms, mt_rand(0, strlen($syms) - 1), 1));
            }

            // hack off a chunk of the base password array that's as big as the special chars array
            $tmp1 = array_slice($tmp1, 0, $l - $count);
            // merge special character(s) array with base password array
            $tmp1 = array_merge($tmp1, $tmp2);
            // mix the characters up
            shuffle($tmp1);
            // convert to string for output
            $out = implode('', $tmp1);
        }

        return $out;
    }

}
