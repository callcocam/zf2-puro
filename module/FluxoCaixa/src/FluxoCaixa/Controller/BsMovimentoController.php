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
class BsMovimentoController extends AbstractController {

    /**
     * construct do Table
     *
     * @return Base\Controller\AbstractController
     */
    public function __construct() {
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
        if (!$this->getCaixa()):
            return $this->redirect()->toRoute($this->route, array('controller' => 'bs-caixa', 'action' => 'index'));
        endif;
        return parent::editarAction();
    }

    public function excluirAction() {
        if (!$this->getCaixa()):
            return $this->redirect()->toRoute($this->route, array('controller' => 'bs-caixa', 'action' => 'index'));
        endif;
        return parent::excluirAction();
    }

    public function indexAction() {
        if (!$this->getCaixa()):
            return $this->redirect()->toRoute($this->route, array('controller' => 'bs-caixa', 'action' => 'index'));
        endif;
        return parent::indexAction();
    }

    public function inserirAction() {
        if (!$this->getCaixa()):
            return $this->redirect()->toRoute($this->route, array('controller' => 'bs-caixa', 'action' => 'index'));
        endif;
        return parent::inserirAction();
    }

    public function publicaAction() {
        if (!$this->getCaixa()):
            return $this->redirect()->toRoute($this->route, array('controller' => 'bs-caixa', 'action' => 'index'));
        endif;
        return parent::publicaAction();
    }

    public function testeAction() {

        $sql = new \Zend\Db\Sql\Sql($this->getAdapter());
        $select = $sql->select();
        $select->from('bs_caixa');
        $select->where(array('state' => 0,'created' => date("Y-m-d")));

        $statement = $sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();
         \Zend\Debug\Debug::dump($results->current());
         die;
        $tableReceber = new \Zend\Db\TableGateway\TableGateway('bs_contas_pagar', $this->getAdapter(), new \Zend\Db\TableGateway\Feature\RowGatewayFeature('publish_up'));
        $tableReceber->update(array('caixa_id' => "2"), array('publish_up' => date("Y-m-d 00:00:00")));
        \Zend\Debug\Debug::dump($tableReceber->getSql());
        die;
    }

}
