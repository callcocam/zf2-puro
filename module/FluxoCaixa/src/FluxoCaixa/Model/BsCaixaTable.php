<?php

/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */

namespace FluxoCaixa\Model;

use Base\Model\AbstractTable;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class BsCaixaTable extends AbstractTable {

    /**
     * construct do Table
     *
     * @return Base\Model\AbstractTable
     */
    public function __construct(TableGateway $tableGateway) {
        // Configurações iniciais do TableModel
        $this->tableGateway = $tableGateway;
    }

    public function findALL($condicao = array(), $paginated = true) {
        $result = parent::findALL($condicao, $paginated);
        $resultSet = [];
        foreach ($result as $key => $value) {
           $said_real=$this->getSqlPersonItem('bs_contas_pagar', array("caixa_id" => $value['id'], 'situacao' => '1'), ['said_real' => new \Zend\Db\Sql\Expression('SUM(valor)')], 'said_real');
            $bs['said_real'] = number_format($said_real, 2, ',', '.');

            $said_previsto=$this->getSqlPersonItem('bs_contas_pagar', array("caixa_id" => $value['id'], 'situacao' => '2'), ['said_previsto' => new \Zend\Db\Sql\Expression('SUM(valor)')], 'said_previsto');
            $bs['said_previsto'] = number_format($said_previsto, 2, ',', '.');

            $ent_real= $this->getSqlPersonItem('bs_contas_receber', array("caixa_id" => $value['id'], 'situacao' => '1'), ['ent_real' => new \Zend\Db\Sql\Expression('SUM(valor)')], 'ent_real');
            $bs['ent_real'] = number_format($ent_real, 2, ',', '.');

            $ent_previsto=$this->getSqlPersonItem('bs_contas_receber', array("caixa_id" => $value['id'], 'situacao' => '2'), ['ent_previsto' => new \Zend\Db\Sql\Expression('SUM(valor)')], 'ent_previsto');
            $bs['ent_previsto'] = number_format($ent_previsto, 2, ',', '.');

            $resultSet[$key] = array_replace($result->getItem($key), $bs);
        }
        $paginator = new \Zend\Paginator\Paginator(new
                \Zend\Paginator\Adapter\ArrayAdapter($resultSet)
        );
        return $paginator;
    }

    public function insert(\Base\Model\AbstractModel $data) {
        parent::insert($data);
        if ($this->getLastInsert()):
            $tableReceber = new TableGateway('bs_contas_receber', $this->getTableGateway()->getAdapter(), new \Zend\Db\TableGateway\Feature\RowGatewayFeature('publish_up'));
            $tableReceber->update(array('caixa_id' => $this->getLastInsert()->getId()), array('publish_up' => date("Y-m-d 00:00:00", strtotime($this->getLastInsert()->getPublishUp()))));
            $tablePagar = new TableGateway('bs_contas_pagar', $this->getTableGateway()->getAdapter(), new \Zend\Db\TableGateway\Feature\RowGatewayFeature('publish_up'));
            $tablePagar->update(array('caixa_id' => $this->getLastInsert()->getId()), array('publish_up' => date("Y-m-d 00:00:00", strtotime($this->getLastInsert()->getPublishUp()))));
        endif;
        return $this->getLastInsert();
    }

    public function update(\Base\Model\AbstractModel $data) {
        parent::update($data);
        if ($this->getLastInsert()):
            $tableReceber = new TableGateway('bs_contas_receber', $this->getTableGateway()->getAdapter(), new \Zend\Db\TableGateway\Feature\RowGatewayFeature('caixa_id'));
            $tableReceber->update(array('state' => $this->getLastInsert()->getState()), array('caixa_id' => $this->getLastInsert()->getId()));
            $tablePagar = new TableGateway('bs_contas_pagar', $this->getTableGateway()->getAdapter(), new \Zend\Db\TableGateway\Feature\RowGatewayFeature('caixa_id'));
            $tablePagar->update(array('state' => $this->getLastInsert()->getState()), array('caixa_id' => $this->getLastInsert()->getId()));
        endif;
        return $this->getLastInsert();
    }

    public function delete($id) {
        parent::delete($id);
        if ($this->getLastInsert()):
            $tableReceber = new TableGateway('bs_contas_receber', $this->getTableGateway()->getAdapter(), new \Zend\Db\TableGateway\Feature\RowGatewayFeature('caixa_id'));
            $tableReceber->delete(array('caixa_id' => $id));

            $tablePagar = new TableGateway('bs_contas_pagar', $this->getTableGateway()->getAdapter(), new \Zend\Db\TableGateway\Feature\RowGatewayFeature('caixa_id'));
            $tablePagar->delete(array('caixa_id' => $id));
        endif;
        return $this->getLastInsert();
    }

}
