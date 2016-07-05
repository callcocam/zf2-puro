<?php

/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */

namespace FluxoCaixa\Model;

use Base\Model\AbstractTable;
use Zend\Db\TableGateway\TableGateway;

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
