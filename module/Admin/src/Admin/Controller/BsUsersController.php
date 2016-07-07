<?php

namespace Admin\Controller;

use Base\Controller\AbstractController;

/**
 * UsersContrller
 */
class BsUsersController extends AbstractController {

    public function __construct() {
        // Configurações iniciais do Controller
        $this->route = "admin/default";
        $this->controller = "bs-users";
        $this->action = "index";
        $this->model = "Admin\Model\BsUsers";
        $this->table = "Admin\Model\BsUsersTable";
        $this->form = "Admin\Form\BsUsersForm";
        $this->template = "/admin/admin/listar";
    }

    public function profileAction() {
        $this->form = "Admin\Form\ProfileForm";
        $this->form = $this->getForm();
        $this->form->setData($this->user);
        $view = new \Zend\View\Model\ViewModel(array(
            'form' => $this->form,
            'route' => $this->route,
            'controller' => $this->controller,
            'action' => 'profileupdate'));
        $view->setTemplate('/admin/admin/profile');
        return $view;
    }
    
    public function profileupdateAction() {
        $this->form = "Admin\Form\ProfileForm";
        $this->model = "Admin\Model\Profile";
        $this->table = "Admin\Model\ProfileTable";
        return parent::publicaAction();
    }

}
