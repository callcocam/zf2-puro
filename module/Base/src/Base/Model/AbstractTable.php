<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Base\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

/**
 * Description of AbstractTable
 *
 * @author Ale
 */
abstract class AbstractTable {

    protected $tableGateway;
    protected $limit=50;
    protected $offset=0;
    abstract function __construct(TableGateway $tableGateway);

    /**
     * Busca todos os regstros do banco sem nenhuma restrição
     * @return type object table bd
     */
    public function findALL() {
        $table = $this->tableGateway->getTable();
        $resultSelect = $this->tableGateway->select(function(Select $select) use ($table) {
            $select
                    ->limit($this->limit)
                    ->offset($this->offset)
                    ->order("{$table}.id DESC");
                    if($table!='bs_users'):
                         $select->join('bs_users', "bs_users.id = {$table}.created_by", array('Username' => 'title'));
                    endif;
                    
        });
        return $resultSelect;
    }

    /**
     * Consulta registro passnaddo o id como paramentro
     * @param type $id
     * @return type um object table bd
     */
    public function find($id) {
        $resultSelect = $this->tableGateway->select(['id' => $id]);
        return $resultSelect->current();
    }

    /**
     * Consulta registro passnaddo um array com um ou mais parametro(s)
     * @param array $param
     * @return type object table bd
     */
    public function findBy(array $param = array()) {
        $resultSelect = $this->tableGateway->select($param);
        return $resultSelect;
    }

    /**
     * Consulta registro passnaddo um array com um ou mais parametro(s)
     * @param array $param
     * @return type um object table bd
     */
    public function findOneBy(array $param = array()) {
        $resultSelect = $this->tableGateway->select($param);
        return $resultSelect->current();
    }

    /**
     * Inserir um registro passando uma model como paramentro
     * @param \Base\Model\AbstractModel $data
     * @return type bool
     */
    public function insert(AbstractModel $data) {
        $data->setCodigo($this->getMax('codigo'));
        return $this->tableGateway->insert($data->toArray());
    }

    /**
     * Atualiza um registro passando uma model como paramentro
     * @param \Base\Model\AbstractModel $data
     * @return boolean
     */
    public function update(AbstractModel $data) {
        //Verifica se o registro existe no banco
        $oldData = $this->find($data->getId());
        if ($oldData) {
            return $this->tableGateway->update($data->toArray(), ['id' => $data->getId()]);
        }
        return FALSE;
    }

    /**
     * Excluir um registro do banco passando id como parametro
     * @param type $id
     * @return type bool
     */
    public function delete($id) {
        return $this->tableGateway->delete(array('id' => $id));
    }

//    FUNÇÕES EXTRAS
    public function getMax($id) {
        $select = $this->tableGateway->getSql()->select();
        $select->columns(array('maxId' => new \Zend\Db\Sql\Expression("MAX({$id})")));
        $query = $this->tableGateway->getSql()->prepareStatementForSqlObject($select);
        $rowset = $query->execute();
        $row = $rowset->current();
        if (!$row) {
            $row['maxId'] = 0;
        }
        return $row['maxId'] + 1;
    }

}
