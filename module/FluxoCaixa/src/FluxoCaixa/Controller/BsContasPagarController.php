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
class BsContasPagarController extends AbstractController {

    /**
     * construct do Table
     *
     * @return Base\Controller\AbstractController
     */
    public function __construct() {
        // Configurações iniciais do Controller
        $this->route = "fluxo-caixa/default";
        $this->controller = "bs-contas-pagar";
        $this->action = "index";
        $this->model = "FluxoCaixa\Model\BsContasPagar";
        $this->table = "FluxoCaixa\Model\BsContasPagarTable";
        $this->form = "FluxoCaixa\Form\BsContasPagarForm";
        $this->template = "/admin/admin/listar";
    }

    public function editarAction() {
        if (!$this->getCaixa()):
            $this->Messages()->flashInfo("OPPSS!, VOÇÊ DEVE ABRIR UMA CONTA PARA O DIA DE HOJE {$this->getServiceLocator()->get('DateFormat')->getDate()}");
            return $this->redirect()->toRoute($this->route, array('controller' => 'bs-caixa', 'action' => 'index'));
        endif;
        $this->form = "FluxoCaixa\Form\PagarForm";
        return parent::editarAction();
    }

    public function excluirAction() {
        if (!$this->getCaixa()):
            return $this->redirect()->toRoute($this->route, array('controller' => 'bs-caixa', 'action' => 'index'));
        endif;
        return parent::excluirAction();
    }

    public function inserirAction() {
        if (!$this->getCaixa()):
            $this->Messages()->flashInfo("OPPSS!, VOÇÊ DEVE ABRIR UMA CONTA PARA O DIA DE HOJE {$this->getServiceLocator()->get('DateFormat')->getDate()}");
            return $this->redirect()->toRoute($this->route, array('controller' => 'bs-caixa', 'action' => 'index'));
        endif;
        return parent::inserirAction();
    }

}
