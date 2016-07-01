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
class BsContasReceberController extends AbstractController
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
        $this->controller = "bs-contas-receber";
        $this->action = "index";
        $this->model = "Admin\Model\BsContasReceber";
        $this->table = "Admin\Model\BsContasReceberTable";
        $this->form = "Admin\Form\BsContasReceberForm";
        $this->template = "/admin/admin/listar";
    }


}