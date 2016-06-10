<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Controller;

/**
 * Description of BsCompaniesController
 *
 * @author Call
 */
class BsCompaniesController extends \Base\Controller\AbstractController {

    public function __construct() {
        $this->route = "admin/default";
        $this->controller = "bs-companies";
        $this->action = "index";
        $this->model = "Admin\Model\BsCompanies";
        $this->table = "Admin\Model\BsCompaniesTable";
        $this->template = "/admin/admin/conpanies";
    }

}
