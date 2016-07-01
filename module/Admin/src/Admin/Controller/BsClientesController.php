<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Admin\Controller;

use Base\Controller\AbstractController;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class BsClientesController extends AbstractController
{

    /**
     * construct do Table
     *
     * @return Base\Controller\AbstractController
     */
    public function __construct()
    {
        // Configurações iniciais do Controller
        $this->route = "admin/default";
        $this->controller = "bs-clientes";
        $this->action = "index";
        $this->model = "Admin\Model\BsClientes";
        $this->table = "Admin\Model\BsClientesTable";
        $this->form = "Admin\Form\BsClientesForm";
        $this->template = "/admin/admin/listar";
    }


}