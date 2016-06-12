<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Base\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

abstract class AbstractController extends AbstractActionController {

    protected $storage;
    protected $authservice;
    protected $user;
    protected $table;
    protected $model;
    protected $form;
    protected $data = array();
    protected $route = "admin/default";
    protected $controller = "admin";
    protected $action = "index";
    protected $template = "/admin/admin/index";

    abstract function __construct();

    public function onDispatch(\Zend\Mvc\MvcEvent $e) {
        //if already login, redirect to success page
        if (!$this->getAuthService()->hasIdentity()) {
            return $this->redirect()->toRoute("auth");
        }
        $this->user=  $this->getAuthService()->getIdentity();
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
        if(!empty($this->form) && is_string($this->form)):
             return $this->getServiceLocator()->get($this->form);
        endif;
        return $this->form;
       
    }

    public function getTableGateway() {
        return $this->getServiceLocator()->get($this->table);
    }

    public function getModel() {
        return $this->getServiceLocator()->get($this->model);
    }

    public function indexAction() {

        if (!empty($this->table)):
            $this->data = $this->getTableGateway()->findAll();
        endif;
        $view = new ViewModel(array(
            'data' => $this->data,
            'route' => $this->route,
            'controller' => $this->controller,
            'user'=>  $this->user));
        $view->setTemplate($this->template);
        return $view;
    }

    public function inserirAction() {

        $request = $this->getRequest();
        $this->form=  $this->getForm();
        if ($request->isPost()) {
            $this->data = $this->params()->fromPost();
            $model = $this->getModel();
            $model->exchangeArray($this->data);
            \Zend\Debug\Debug::dump($model);
                        die();
            //Se exitir o campo id valido e uma edição
            if (isset($this->data['id']) && (int) $this->data['id']):
                $result = $this->getTableGateway()->update($model);
            else:
                $result = $this->getTableGateway()->insert($model);
            endif;
            if ($result) {
                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller, 'action' => $this->action));
            }
        }
        $view = new ViewModel(array(
            'data' => $this->data, 
            'route' => $this->route, 
            'controller' => $this->controller,
             'form'=>  $this->form));
        $view->setTemplate('/admin/admin/inserir');
        return $view;
    }

    public function editarAction() {
        $id = $this->params()->fromRoute('id', 0);
        if (!(int) $id) {
            return $this->redirect()->toRoute($this->route, array('controller' => $this->controller, 'action' => $this->action));
        }
        $this->data = $this->getTableGateway()->find($id);
        if (!$this->data) {
            return $this->redirect()->toRoute($this->route, array('controller' => $this->controller, 'action' => $this->action));
        }
        $view = new ViewModel(array('data' => $this->data->toArray(), 'route' => $this->route, 'controller' => $this->controller));
        $view->setTemplate($this->template);
        return $view;
    }

}
