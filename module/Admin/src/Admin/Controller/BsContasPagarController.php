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
class BsContasPagarController extends AbstractController
{

    /**
     * construct do Table
     *
     * @return Base\Controller\AbstractController
     */
    public function __construct()
    {
        // Configurações iniciais do Controller
        $this->route = "fluxo-caixa/default";
        $this->controller = "bs-contas-pagar";
        $this->action = "index";
        $this->model = "Admin\Model\BsContasPagar";
        $this->table = "Admin\Model\BsContasPagarTable";
        $this->form = "Admin\Form\BsContasPagarForm";
        $this->template = "/admin/admin/listar";
    }


}