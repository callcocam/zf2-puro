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
    protected $model;
    protected $form;
    protected $data = array();
    protected $route = "auth/default";
    protected $controller = "auth";
    protected $action = "index";
    protected $template = "/auth/auth/index";

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
        return new ViewModel(array('rowset' => $this->getTableGateway()->findALL()));
    }

    // C - Create
    public function createAction() {
        //if already login, redirect to success page
        if ($this->getAuthService()->hasIdentity()) {
            return $this->redirect()->toRoute($this->route, array('controller' => $this->controller, 'action' => 'index'));
        }
        $this->form = $this->getForm();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $this->data = $this->params()->fromPost();
            $this->data['password'] = $this->encryptPassword(
                    $this->data['email'], $this->data['password']);
            if (empty($this->data['usr_registration_token'])):
                $this->data['usr_registration_token'] = md5(uniqid(mt_rand(), true));
            endif;
            $model = $this->getModel();
            $model->exchangeArray($this->data);
            $this->form->setData($model->toArray());
            if ($this->form->isValid()) {
                $this->getTableGateway()->insert($model);
                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller, 'action' => 'index'));
            }
        }
        return new ViewModel(array('form' => $this->form));
    }

    // U - Update
    public function updateAction() {
        //if already login, redirect to success page
        if (!$this->getAuthService()->hasIdentity()) {
            return $this->redirect()->toRoute($this->route, array('controller' => $this->controller, 'action' => 'index'));
        }
        $id = $this->params()->fromRoute('id');
        if (!$id)
            return $this->redirect()->toRoute($this->route, array('controller' => $this->controller, 'action' => 'index'));
        $this->form = $this->getForm();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $this->data = $this->params()->fromPost();
            $this->data['password'] = $this->encryptPassword($this->data['email'], $this->data['password']);
            $model = $this->getModel();
            $model->exchangeArray($this->data);
            $this->form->setData($model->toArray());
            $validator=$this->setValidation('bs_users', 'email', array(
                    'field' => 'id',
                    'value' => $model->getId()
                ));
            $validator->setMessage("Registro Não Existe", 'noRecordFound');
            $validator->setMessage("Registro Ja Existe", 'recordFound');
            $this->form->getInputFilter()->get('email')->getValidatorChain()->attach($validator);
            if ($this->form->isValid()) {
                $this->getTableGateway()->update($model);
                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller, 'action' => 'index'));
            }
        } else {
            $this->form->setData($this->getTableGateway()->find($id)->toArray());
        }
        return new ViewModel(array('form' => $this->form, 'id' => $id));
    }

    // D - delete
    public function deleteAction() {
        $id = $this->params()->fromRoute('id');
        if ($id) {
            $this->getTableGateway()->delete($id);
        }
        return $this->redirect()->toRoute($this->route, array('controller' => $this->controller, 'action' => 'index'));
    }

    public function setValidation($table,$fild,$exclude="") {
        $validator = new \Zend\Validator\Db\NoRecordExists(array(
            'table' => $table,
            'field' => $fild,
            'schema' => 'base',
            'adapter' => $this->getAdapter(),
            "exclude"=>$exclude
        ));
        $validator->setMessage("Registro Não Existe", 'noRecordFound');
        $validator->setMessage("Registro Ja Existe", 'recordFound');
        return $validator;
    }

}
