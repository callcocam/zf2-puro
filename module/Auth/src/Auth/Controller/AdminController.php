<?php

namespace Auth\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Db\TableGateway\TableGateway;
use Auth\Form\UserForm;
use Auth\Form\UserFilter;

class AdminController extends AbstractActionController {

    protected $usersTable = null;
    protected $table;
    protected $model;
    protected $form;
    protected $data = array();
    protected $route = "auth/default";
    protected $controller = "auth";
    protected $action = "index";
    protected $template = "/auth/auth/index";

    public function __construct() {
        $this->route = "auth/default";
        $this->controller = "auth";
        $this->action = "index";
        $this->form = "Auth\Form\BsUsersForm";
        $this->model = "Auth\Model\BsUsers";
        $this->table = "Auth\Model\BsUsersTable";
        $this->template = "/auth/auth/listar";
    }

    public function getAdapter() {
        return $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
    }

    public function getForm() {
        return $this->getServiceLocator()->get($this->form);
    }

    public function getTableGateway() {
        return $this->getServiceLocator()->get($this->table);
    }

    public function getModel() {
        return $this->getServiceLocator()->get($this->model);
    }

    // R - retrieve = Index
    public function indexAction() {
        return new ViewModel(array('rowset' => $this->getUsersTable()->findALL()));
    }

    // C - Create
    public function createAction() {
        $this->form = $this->getForm();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $this->data = $this->params()->fromPost();
            if (empty($this->data['usr_registration_date']))
                $this->data['usr_registration_date'] = date("Y-m-d H:i:s");
            if (empty($this->data['usr_registration_token']))
                $this->data['usr_registration_token'] = md5(date("Y-m-d H:i:s"));
            $model = $this->getModel();
            $model->exchangeArray($this->data);
            $this->form->setData($model->toArray());
            if ($this->form->isValid()) {
                $this->getUsersTable()->insert($model);
                return $this->redirect()->toRoute('auth/default', array('controller' => 'admin', 'action' => 'index'));
            } else {
                var_dump($this->form->getMessages());
            }
        }
        return new ViewModel(array('form' => $this->form));
    }

    // U - Update
    public function updateAction() {
        $id = $this->params()->fromRoute('id');
        if (!$id)
            return $this->redirect()->toRoute('auth/default', array('controller' => 'admin', 'action' => 'index'));
        $this->form = $this->getForm();
        $request = $this->getRequest();
        if ($request->isPost()) {

            $this->data = $this->params()->fromPost();
            if (empty($this->data['usr_registration_date']))
                $this->data['usr_registration_date'] = date("Y-m-d H:i:s");
            if (empty($this->data['usr_registration_token']))
                $this->data['usr_registration_token'] = md5(date("Y-m-d H:i:s"));
            $model = $this->getModel();
            $model->exchangeArray($this->data);
            $this->form->setData($model->toArray());
            $validator = new \Zend\Validator\Db\NoRecordExists(array(
                'table' => 'bs_users',
                'field' => 'email',
                'schema' => 'base',
                'adapter' => $this->getAdapter(),
                'exclude' => array(
                    'field' => 'id',
                    'value' => $model->getId()
                )
            ));
            echo $model->getId();
            $validator->setMessage("Registro Não Existe", 'noRecordFound');
            $validator->setMessage("Registro Ja Existe", 'recordFound');
            $this->form->getInputFilter()->get('email')->getValidatorChain()->attach($validator);
            
            if ($this->form->isValid()) {
                $this->getUsersTable()->update($model);
                return $this->redirect()->toRoute('auth/default', array('controller' => 'admin', 'action' => 'index'));
            }
        }
        else {
            $this->form->setData($this->getUsersTable()->find($id)->toArray());
        }

        return new ViewModel(array('form' => $this->form, 'id' => $id));
    }

    // D - delete
    public function deleteAction() {
        $id = $this->params()->fromRoute('id');
        if ($id) {
            $this->getUsersTable()->delete($id);
        }

        return $this->redirect()->toRoute('auth/default', array('controller' => 'admin', 'action' => 'index'));
    }

    public function getUsersTable() {
        // I have a Table data Gateway ready to go right out of the box
        if (!$this->usersTable) {
            $this->usersTable = $this->getServiceLocator()->get($this->table);
        }
        return $this->usersTable;
    }

}
