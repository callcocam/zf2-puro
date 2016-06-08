<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Base\Model;

use Zend\Db\TableGateway\TableGateway;

/**
 * Description of AbstractTable
 *
 * @author Ale
 */
abstract class AbstractTable {

    protected $tableGateway;

    abstract function __construct(TableGateway $tableGateway);

    public function findALL() {
        $resultSelect = $this->tableGateway->select();
        return $resultSelect;
    }

    public function find($id) {
        $resultSelect = $this->tableGateway->select(['id' => $id]);
        return $resultSelect->current();
    }

    public function insert(AbstractModel $data) {
        $data->setCodigo($this->getMax('codigo'));
        return $this->tableGateway->insert($data->toArray());
    }

    public function update(AbstractModel $data) {

        $oldData = $this->find($data->getId());
        if ($oldData) {

            return $this->tableGateway->update($data->toArray(), ['id' => $data->getId()]);
        }
        throw new Exception("User não encontrado");
    }

    public function delete($id) {
        $this->tableGateway->delete(array('id' => $id));
    }

//    FUNÇÕES EXTRAS
    public function getMax($id) {
        $select = $this->tableGateway->getSql()->select();
        $select->columns(array(
            'maxId' => new \Zend\Db\Sql\Expression("MAX({$id})")
        ));
        $query = $this->tableGateway->getSql()->prepareStatementForSqlObject($select);
        $rowset = $query->execute();
        $row = $rowset->current();
                
        if (!$row) {
            $row['maxId'] = 0;
        }
        return $row['maxId'] + 1;
    }

}
