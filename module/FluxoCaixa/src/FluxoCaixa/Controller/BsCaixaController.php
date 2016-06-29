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
class BsCaixaController extends AbstractController {

    /**
     * construct do Table
     *
     * @return Base\Controller\AbstractController
     */
    public function __construct() {
        // Configurações iniciais do Controller
        $this->route = "fluxo-caixa/default";
        $this->controller = "bs-caixa";
        $this->action = "index";
        $this->model = "FluxoCaixa\Model\BsCaixa";
        $this->table = "FluxoCaixa\Model\BsCaixaTable";
        $this->form = "FluxoCaixa\Form\BsCaixaForm";
        $this->template = "/admin/admin/listar";
    }

    public function publicaAction() {
        if ($this->caixa):
            $this->getCache()->removeItem('caixa');
        endif;
        return parent::publicaAction();
    }

    public function inserirAction() {
        if ($this->caixa):
            $this->Messages()->flashInfo("JA EXISTE UM CAIXA ABERTO PARA HOJE!");
            return $this->redirect()->toRoute($this->route, array('controller' => 'bs-caixa', 'action' => 'index'));
        endif;
        return parent::inserirAction();
    }

}
