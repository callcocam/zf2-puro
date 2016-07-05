<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Operacional\Controller;

/**
 * Description of BsCompaniesController
 *
 * @author Call
 */
class BsCompaniesController extends \Base\Controller\AbstractController {

    public function __construct() {
        $this->route = "operacional/default";
        $this->controller = "bs-companies";
        $this->action = "index";
        $this->model = "Operacional\Model\BsCompanies";
        $this->table = "Operacional\Model\BsCompaniesTable";
        $this->form="Operacional\Form\BsCompaniesForm";
        $this->template = "/admin/admin/conpanies";
    }

    public function indexAction()
    {
    	if($this->user['role_id']==1):
    		$this->template = "/admin/admin/listar";
    	endif;
    	return parent::indexAction();

    }

  

}
