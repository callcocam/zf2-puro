<?php

namespace Auth\Controller;

use Zend\View\Model\ViewModel;
use Auth\Form\ForgottenPasswordFilter;

class RegistrationController extends AbstractController {

    public function __construct() {
        $this->route = "auth/default";
        $this->controller = "registration";
        $this->action = "forgotten-password";
        $this->form = "Auth\Form\RegistrationForm";
        $this->model = "Auth\Model\BsUsers";
        $this->table = "Auth\Model\BsUsersTable";
        $this->template = "/auth/admin/index";
    }

    public function registrationAction() {
        //VERIFICAÇÃO:SOMENTE USUARIO DESLOGADO
        if ($this->getAuthService()->hasIdentity()) {
            $this->Messages()->flashInfo("Você ja esta logado, para criar uma nova conta você deve fazer logout");
            return $this->redirect()->toRoute($this->route, array('controller' => $this->controller, 'action' => 'profileupdate'));
        }
        $this->form = $this->getForm();
        $cache = $this->CachePlugin()->getItem('companies');
        $request = $this->getRequest();
        if ($request->isPost()) {
            $this->data = $this->prepareData($this->params()->fromPost());
            $auth = $this->getModel();
            $auth->exchangeArray($this->data);
            $this->form->setData($this->data);
            //Valida se ja existe um resgistro no banco
            $validator = $this->setValidation('bs_users', 'email');
            $this->form->getInputFilter()->get('email')->getValidatorChain()->attach($validator);
            if ($this->form->isValid()) {
                $result = $this->getTableGateway()->insert($auth);
                if ($result) {
                    $this->sendConfirmationEmail($auth);
                    $this->Messages()->flashSuccess("MSG_CADASTRO_SUCCCESS");
                } else {
                    $this->Messages()->error("MSG_CADASTRO_ERROR");
                }
                return $this->redirect()->toRoute('auth/default', array('controller' => 'registration', 'action' => 'registration-success'));
            }
        }
        return new ViewModel(array('form' => $this->form, 'companies' => $cache));
    }

    public function profileupdateAction() {

        //VERIFICAÇÃO:SOMENTE USUARIO LOGADO
        if (!$this->getAuthService()->hasIdentity()) {
            return $this->redirect()->toRoute($this->route, array('controller' => $this->controller, 'action' => 'index'));
        }
        //CARREGAMOS O FORMULARIO PARA EDIÇÃO FEITA PELO USUARIO
        $this->form = "Auth\Form\ProfileForm";
        $this->form = $this->getForm();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $this->data = $this->params()->fromPost();
            $this->data['password'] = $this->encryptPassword($this->data['email'], $this->data['password']);
            $this->data['usr_password_confirm'] = $this->encryptPassword($this->data['email'], $this->data['usr_password_confirm']);
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
                    $this->Messages()->flashSuccess("MSG_CADASTRO_SUCCCESS");
                } else {
                    $this->Messages()->error("MSG_CADASTRO_ERROR");
                }
                return $this->redirect()->toRoute($this->route, array('controller' => 'admin', 'action' => 'index'));
            }
        } else {
            //CARREGAR OS DADOS DO USUARIO LOGADO NO FORM
            $model = $this->getTableGateway()->find($this->user['id']);
            $this->form->setData($this->user);
        }
        $view = new ViewModel(array('form' => $this->form));
        return $view;
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
            $this->getTableGateway()->activateUser($user->getId());
        } catch (\Exception $e) {
            $viewModel->setTemplate('auth/registration/confirm-email-error.phtml');
        }
        return $viewModel;
    }

    public function forgottenPasswordAction() {
        $this->form = 'Auth\Form\ForgottenPasswordForm';
        $this->form = $this->getForm();
        $this->form->get('submit')->setValue('Solicitar');
        $request = $this->getRequest();
        if ($request->isPost()) {
            $this->form->setData($request->getPost());
            //VERIFICA SE O FORMULARIO E VALIDO
            if ($this->form->isValid()) {
                $this->data = $this->form->getData();
                $usr_email = $this->data['email'];
                //PEGA OS DADOS DO USUARIO NO BANCO PELO EMAIL
                 $auth = $this->getTableGateway()->getUserByEmail($usr_email);
                //VERIFICA SE ENCONTRO UM USUARIO
                if ($auth) {
                    //GERA UMA NOVA MSENHA
                    $password = $this->generatePassword();
                    $auth->setPassword($this->encryptPassword($usr_email, $password, $this->getStaticSalt()));
                    //TENTA ALTERAR A SENHA NO BANCO
                    $result = $this->getTableGateway()->update($auth);
                    //SE ALTERO A SENHA ENVIA POR EMAIL
                    if ($result) {
                        $this->Messages()->flashSuccess("MSG_CADASTRO_SUCCCESS");
                        //ENVIA A SENHA POR EMAIL
                        $this->sendPasswordByEmail($usr_email, $password);
                        return $this->redirect()->toRoute('auth/default', array('controller' => 'registration', 'action' => 'password-change-success'));
                    } else {
                        $this->Messages()->error("MSG_CADASTRO_ERROR");
                    }
                }
            }
            else{
                 foreach ($this->form->getMessages() as $msg):
                            $this->Messages()->error(implode(PHP_EOL, $msg));
                  endforeach;
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
       //MONTAR A URL DO SITE COM A KEY DE ATIVAÇÃO DA CONTA
        $url = sprintf("%s%s", $this->getRequest()->getServer('HTTP_ORIGIN'), $this->url()->fromRoute('auth/default', array(
                    'controller' => 'registration',
                    'action' => 'confirm-email',
                    'id' => $auth->getUsrRegistrationToken())));
        //PEAR OS DADOS DO USUARIO RECEM CADASTARDO
        $data = $auth->toArray();
        //ADCIONAMOS A URL COM A KEY A VAR DATA
        $data['url'] = $url;
        //PEGAMOS O SERVIÇO DE EMAIL
        $mail = $this->getServiceLocator()->get("Mail\Service\Mail");
        //SETAMOS AS INFORMAÇÕES DE ENVIO 
         //:assunto ->Subject
        //:email do usuario que se cadastro ->To
        //:dados do email ->Data
        //:template de email ->Template
        $mail->setSubject('Please, confirm your registration!')
                ->setTo($auth->getEmail())
                ->setData($data)
                ->setViewTemplate('confirmacao');
        $mail->send();
    }

    public function sendPasswordByEmail($usr_email, $password) {
       //URL DO SITE
        $url = sprintf("%s", $this->getRequest()->getServer('HTTP_ORIGIN'));
        $data['url'] = $url;
        //NOVO PASSWORD
        $data['password'] = $password;
       //SERVIÇO DE EMAIL
        $mail = $this->getServiceLocator()->get("Mail\Service\Mail");
        //SETAMOS AS INFORMAÇÕES DE ENVIO 
        //:assunto ->Subject
        //:email do usuario que se cadastro ->To
        //:dados do email ->Data
        //:template de email ->Template
        $mail->setSubject('Your password has been changed!')
                ->setTo($usr_email)
                ->setData($data)
                ->setViewTemplate('forgotten-password');
        $mail->send();
    }

}
