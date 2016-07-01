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
class BsMovimentoController extends AbstractController
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
        $this->controller = "bs-movimento";
        $this->action = "index";
        $this->model = "FluxoCaixa\Model\BsMovimento";
        $this->table = "FluxoCaixa\Model\BsMovimentoTable";
        $this->form = "FluxoCaixa\Form\BsMovimentoForm";
        $this->template = "/admin/admin/listar";
    }

    public function editarAction() {
        if(!$this->caixa):
            return $this->redirect()->toRoute($this->route,array('controller'=>'bs-caixa','action'=>'index'));
        endif;
        return parent::editarAction();
    }

    public function excluirAction() {
         if(!$this->caixa):
            return $this->redirect()->toRoute($this->route,array('controller'=>'bs-caixa','action'=>'index'));
        endif;
        return parent::excluirAction();
    }

    public function indexAction() {
         if(!$this->caixa):
            return $this->redirect()->toRoute($this->route,array('controller'=>'bs-caixa','action'=>'index'));
        endif;
        return parent::indexAction();
    }

    public function inserirAction() {
         if(!$this->caixa):
            return $this->redirect()->toRoute($this->route,array('controller'=>'bs-caixa','action'=>'index'));
        endif;
        return parent::inserirAction();
    }

    public function publicaAction() {
         if(!$this->caixa):
            return $this->redirect()->toRoute($this->route,array('controller'=>'bs-caixa','action'=>'index'));
        endif;
        return parent::publicaAction();
    }

}