<?php

namespace Auth\Controller;

class AdminController extends AbstractController {

    public function __construct() {
        $this->route = "auth/default";
        $this->controller = "admin";
        $this->action = "index";
        $this->form = "Auth\Form\BsUsersForm";
        $this->model = "Auth\Model\BsUsers";
        $this->table = "Auth\Model\BsUsersTable";
        $this->template = "/auth/auth/listar";
    }
}
