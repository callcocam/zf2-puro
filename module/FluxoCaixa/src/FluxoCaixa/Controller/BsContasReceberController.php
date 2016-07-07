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
class BsContasReceberController extends AbstractController {

    /**
     * construct do Table
     *
     * @return Base\Controller\AbstractController
     */
    public function __construct() {
        // Configurações iniciais do Controller
        $this->route = "fluxo-caixa/default";
        $this->controller = "bs-contas-receber";
        $this->action = "index";
        $this->model = "FluxoCaixa\Model\BsContasReceber";
        $this->table = "FluxoCaixa\Model\BsContasReceberTable";
        $this->form = "FluxoCaixa\Form\BsContasReceberForm";
        $this->template = "/admin/admin/listar";
    }

    public function editarAction() {
         if (!$this->getCaixa()):
           $this->Messages()->flashInfo("OPPSS!, VOÇÊ DEVE ABRIR UMA CONTA PARA O DIA DE HOJE {$this->getServiceLocator()->get('DateFormat')->getDate()}");
            return $this->redirect()->toRoute($this->route, array('controller' => 'bs-caixa', 'action' => 'index'));
        endif;
        $this->template = "/admin/admin/editar";
        return parent::editarAction();
    }

    public function inserirAction() {
         if (!$this->getCaixa()):
            $this->Messages()->flashInfo("OPPSS!, VOÇÊ DEVE ABRIR UMA CONTA PARA O DIA DE HOJE {$this->getServiceLocator()->get('DateFormat')->getDate()}");
            return $this->redirect()->toRoute($this->route, array('controller' => 'bs-caixa', 'action' => 'index'));
        endif;
        return parent::inserirAction();
    }

}
