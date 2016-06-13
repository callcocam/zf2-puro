<?php

/**
 * Zend Framework (http://framework.zend.com/)
 * sigasmart.com.br
 */

namespace Auth\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Crypt\Key\Derivation\Pbkdf2;

abstract class AbstractController extends AbstractActionController {

    abstract function __construct();

    protected $storage;
    protected $authservice;
    protected $usersTable = null;
    protected $table;
    protected $user;
    protected $model;
    protected $form;
    protected $data = array();
    protected $route = "auth/default";
    protected $controller = "auth";
    protected $action = "index";
    protected $template = "/auth/admin/index";

    public function onDispatch(\Zend\Mvc\MvcEvent $e) {
        $this->user = $this->getAuthService()->getIdentity();
        return parent::onDispatch($e);
    }

    public function getAuthService() {
        if (!$this->authservice) {
            $this->authservice = $this->getServiceLocator()->get('AuthService');
        }

        return $this->authservice;
    }

    public function getSessionStorage() {
        if (!$this->storage) {
            $this->storage = $this->getServiceLocator()->get('Auth\Model\AuthStorage');
        }
        return $this->storage;
    }

    public function getAdapter() {
        return $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
    }

    public function getForm() {
        if (is_string($this->form)) {
            return $this->getServiceLocator()->get($this->form);
        }
        return $this->form;
    }

    public function getTableGateway() {
        return $this->getServiceLocator()->get($this->table);
    }

    public function getModel() {
        return $this->getServiceLocator()->get($this->model);
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

    // R - retrieve = Index
    public function indexAction() {
        //if already login, redirect to success page
        $rowset = array();
        if ($this->getAuthService()->hasIdentity()) {
            $this->user = $this->getAuthService()->getIdentity();

            if ($this->user['role_id'] > 2) {
                $this->form = "Auth\Form\ProfileForm";
                $this->form = $this->getForm();
                $this->form->setData($this->user);
                $this->template = "/auth/admin/profile";
            } else {
                $rowset = $this->getTableGateway()->findALL();
            }
        }
        $view = new ViewModel(array('rowset' => $rowset, 'user' => $this->user, 'form' => $this->form));
        $view->setTemplate($this->template);
        return $view;
    }

    // C - Create
    public function createAction() {
        //if already login, redirect to success page
        if (!$this->getAuthService()->hasIdentity()) {
            return $this->redirect()->toRoute($this->route, array('controller' => $this->controller, 'action' => 'index'));
        }
        $this->form = $this->getForm();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $this->data = $this->params()->fromPost();
            $this->data = $this->prepareData($this->params()->fromPost());
            $model = $this->getModel();
            $model->exchangeArray($this->data);
            $this->form->setData($this->data);
            if ($this->form->isValid()) {
                $result = $this->getTableGateway()->insert($model);
                if ($result) {
                    $this->Messages()->flashSuccess("MSG_CADASTRO_SUCCCESS");
                } else {
                    $this->Messages()->error("MSG_CADASTRO_ERROR");
                }
                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller, 'action' => 'index'));
            }
        }
        $view = new ViewModel(array('form' => $this->form));
        $view->setTemplate($this->template);
        return $view;
    }

    // U - Update
    public function updateAction() {
        //if already login, redirect to success page
        if (!$this->getAuthService()->hasIdentity()) {
            $this->Messages()->flashError("MSG_ACCESS_NEGADO");
            return $this->redirect()->toRoute("auth");
        }
        $id = $this->params()->fromRoute('id');
        $this->form = $this->getForm();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $this->data = $this->params()->fromPost();
            $model = $this->getModel();
            $model->exchangeArray($this->data);
            $this->form->setData($this->data);
            $validator = $this->setValidation('bs_users', 'email', array(
                'field' => 'id',
                'value' => $model->getId()
            ));
            $this->form->getInputFilter()->get('email')->getValidatorChain()->attach($validator);
            if ($this->form->isValid()) {
                $result = $this->getTableGateway()->update($model);
                if ($result) {
                    $this->Messages()->flashSuccess("MSG_UPDATE_SUCCCESS");
                } else {
                    $this->Messages()->error("MSG_UPDATE_ERROR");
                }
                return $this->redirect()->toRoute($this->route, array('controller' => 'admin', 'action' => 'index'));
            }
        } else {
            if (!$id) {
                return $this->redirect()->toRoute($this->route, array('controller' => 'admin', 'action' => 'index'));
            }
            $this->form->setData($this->getTableGateway()->find($id)->toArray());
        }
        $view = new ViewModel(array('form' => $this->form, 'id' => $id));
        $view->setTemplate($this->template);
        return $view;
    }

    // D - delete
    public function deleteAction() {
        $id = $this->params()->fromRoute('id');
        if ($id) {
            $this->getTableGateway()->delete($id);
        }
        return $this->redirect()->toRoute($this->route, array('controller' => $this->controller, 'action' => 'index'));
    }

    public function setValidation($table, $fild, $exclude = "", $recordFound = "Registro Ja Existe", $noRecordFound = "Registro Não Existe") {
        $validator = new \Zend\Validator\Db\NoRecordExists(array(
            'table' => $table,
            'field' => $fild,
            'adapter' => $this->getAdapter()
        ));
        
        if (!empty($exclude)):
            $validator->setExclude($exclude);
        endif;
        $validator->setMessage($noRecordFound, 'noRecordFound');
        $validator->setMessage($recordFound, 'recordFound');
        return $validator;
    }

    public function prepareData($data) {
        if (!empty($data['password'])):
            $data['password'] = $this->encryptPassword($data['email'], $data['password']);
            $data['usr_password_confirm'] = $this->encryptPassword($data['email'], $data['usr_password_confirm']);
            $data['usr_registration_token'] = md5(uniqid(mt_rand(), true));
        endif;
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
