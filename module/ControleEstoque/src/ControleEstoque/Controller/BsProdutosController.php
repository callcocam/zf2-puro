<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace ControleEstoque\Controller;

use Base\Controller\AbstractController;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class BsProdutosController extends AbstractController
{

    /**
     * construct do Table
     *
     * @return Base\Controller\AbstractController
     */
    public function __construct()
    {
        // Configurações iniciais do Controller
        $this->route = "controle-estoque/default";
        $this->controller = "bs-produtos";
        $this->action = "index";
        $this->model = "ControleEstoque\Model\BsProdutos";
        $this->table = "ControleEstoque\Model\BsProdutosTable";
        $this->form = "ControleEstoque\Form\BsProdutosForm";
        $this->template = "/admin/admin/listar";
    }


}

