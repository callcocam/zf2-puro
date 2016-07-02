<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Gestao\Controller;

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
        $this->route = "gestao/default";
        $this->controller = "bs-clientes";
        $this->action = "index";
        $this->model = "Gestao\Model\BsClientes";
        $this->table = "Gestao\Model\BsClientesTable";
        $this->form = "Gestao\Form\BsClientesForm";
        $this->template = "/admin/admin/listar";
    }


}

