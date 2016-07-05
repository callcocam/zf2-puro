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
class BsFornecedoresController extends AbstractController
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
        $this->controller = "bs-fornecedores";
        $this->action = "index";
        $this->model = "Gestao\Model\BsFornecedores";
        $this->table = "Gestao\Model\BsFornecedoresTable";
        $this->form = "Gestao\Form\BsFornecedoresForm";
        $this->template = "/admin/admin/listar";
    }


}

