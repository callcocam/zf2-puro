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

}
