<?php

namespace Auth\Controller;

class AdminController extends \Base\Controller\AbstractController {

    public function __construct() {
        $this->route = "auth/default";
        $this->controller = "admin";
        $this->action = "index";
        $this->form = "Auth\Form\BsUsersCreateForm";
        $this->model = "Auth\Model\BsUsers";
        $this->table = "Auth\Model\BsUsersTable";
        $this->template = "/admin/admin/listar";
    }
    public function updateAction() {
        $this->form = "Auth\Form\BsUsersUpdateForm";
        $this->template = "/auth/admin/update";
        return parent::updateAction();
    }
      public function createAction() {
        $this->form = "Auth\Form\BsUsersCreateForm";
        $this->template = "/auth/admin/create";
        return parent::createAction();
    }



}
