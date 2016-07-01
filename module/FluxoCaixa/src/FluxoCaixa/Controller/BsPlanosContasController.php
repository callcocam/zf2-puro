<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace FluxoCaixa\Controller;

use Base\Controller\AbstractController;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class BsPlanosContasController extends AbstractController
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
        $this->controller = "bs-planos-contas";
        $this->action = "index";
        $this->model = "FluxoCaixa\Model\BsPlanosContas";
        $this->table = "FluxoCaixa\Model\BsPlanosContasTable";
        $this->form = "FluxoCaixa\Form\BsPlanosContasForm";
        $this->template = "/admin/admin/listar";
    }


}