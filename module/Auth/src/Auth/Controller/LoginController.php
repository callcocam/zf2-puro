<?php

namespace Auth\Controller;

use Zend\View\Model\ViewModel;

class LoginController extends AbstractController {

    public function __construct() {
        $this->route = "auth/default";
        $this->controller = "login";
        $this->action = "index";
        $this->form = "Auth\Form\AuthForm";
        $this->model = "Auth\Model\BsUsers";
        $this->table = "Auth\Model\BsUsersTable";
        $this->template = "/admin/admin/index";
    }

    public function loginAction() {
        //if already login, redirect to success page
        if ($this->getAuthService()->hasIdentity()) {
            return $this->redirect()->toRoute($this->route, array('controller' => $this->controller, 'action' => 'index'));
        }
        $this->storage = $this->getSessionStorage();
        $this->form = $this->getForm();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $this->form->setData($request->getPost());
            if ($this->form->isValid()) {
                //check authentication...
                $password = $this->encryptPassword($request->getPost('email'), $request->getPost('password'));
                $this->getAuthService()->getAdapter()
                        ->setIdentity($request->getPost('email'))
                        ->setCredential($password);
                $result = $this->getAuthService()->authenticate();
                $msg=[];
                foreach ($result->getMessages() as $message):
                       $msg[]= $message;
                endforeach;
                 
                if ($result->isValid()) {
                    $columnsToOmit = array('password');
                    //check if it has rememberMe :
                    if ($request->getPost('rememberme') == 1) {
                        $this->storage->setRememberMe(1);
                        //set storage again
                        $this->getAuthService()->setStorage($this->getSessionStorage());
                    }
                    $resultObject=$this->getAuthService()->getAdapter()->getResultRowObject(null, $columnsToOmit);
                    $model = $this->getTableGateway()->find($resultObject->id);
                    $this->Messages()->flashSuccess(implode(PHP_EOL, $msg));
                    $this->getAuthService()->getStorage()->write($model->toArray());
                    return $this->redirect()->toRoute($this->route, array('controller' => $this->controller, 'action' => 'index'));
                }
                else
                {
                    $this->Messages()->flashError(implode(PHP_EOL, $msg)); 
                }
            }
            else{
                 foreach ($this->form->getMessages() as $message):
                       $msg[]= implode(PHP_EOL,$message);
                endforeach;
                $this->Messages()->flashError(implode(PHP_EOL, $msg)); 
            }
        }
        return new ViewModel(array('form' => $this->form, 'route' => $this->route, 'controller' => $this->controller));
    }

    public function logoutAction() {
        if (!$this->getAuthService()->hasIdentity()) {
            return $this->redirect()->toRoute($this->route);
        }
        $this->Messages()->flashError("Volte sempre");
        $this->storage = $this->getSessionStorage();
        $this->getAuthService()->clearIdentity();
        $this->storage->forgetMe();
        return $this->redirect()->toRoute($this->route);
    }

}
