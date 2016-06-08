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
        $this->form = "Auth\Form\BsUsers";
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
        $this->form = new UserForm();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $this->form->setInputFilter(new UserFilter());
            $this->form->setData($request->getPost());
            if ($this->form->isValid()) {
                $data = $this->form->getData();
                unset($data['submit']);
                if (empty($data['usr_registration_date']))
                    $data['usr_registration_date'] = '2013-07-19 12:00:00';
                $this->getUsersTable()->insert($data);
                return $this->redirect()->toRoute('auth/default', array('controller' => 'admin', 'action' => 'index'));
            }
        }
        return new ViewModel(array('form' => $this->form));
    }

    // U - Update
    public function updateAction() {
        $id = $this->params()->fromRoute('id');
        if (!$id)
            return $this->redirect()->toRoute('auth/default', array('controller' => 'admin', 'action' => 'index'));
        $form = new UserForm();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter(new UserFilter());
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $data = $form->getData();
                unset($data['submit']);
                if (empty($data['usr_registration_date']))
                    $data['usr_registration_date'] = '2013-07-19 12:00:00';
                $this->getUsersTable()->update($data, array('usr_id' => $id));
                return $this->redirect()->toRoute('auth/default', array('controller' => 'admin', 'action' => 'index'));
            }
        }
        else {
            $form->setData($this->getUsersTable()->find($id)->toArray());
        }

        return new ViewModel(array('form' => $form, 'id' => $id));
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
