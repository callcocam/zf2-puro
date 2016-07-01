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
    protected $limit = 50;
    protected $offset = 0;
    protected $error;
    protected $result;
    protected $last_insert;
    protected $class;
    protected $msg;

    abstract function __construct(TableGateway $tableGateway);

    /**
     * Busca todos os regstros do banco sem nenhuma restrição
     * @return type object table bd
     */
    public function findALL($condicao = array(), $paginated = true) {
        $table = $this->tableGateway->getTable();
        if ($paginated) {
            $select = new Select($table);
            if ($table != 'bs_users'):
                $select->join('bs_users', "bs_users.id = {$table}.created_by", array('Username' => 'title'));
            endif;
            if (isset($condicao['state']) && (int) $condicao['state'] >= 0):
                $select->where(array("{$table}.state" => $condicao['state']));
            endif;
            if (isset($condicao['created']) && !empty($condicao['created']) && isset($condicao['publish_down']) && empty($condicao['publish_down'])):
                $select->where->between("{$table}.created", date('Y-m-d', strtotime($condicao['created'])), date('Y-m-d', strtotime("2050-01-01")));
            elseif (isset($condicao['created']) && !empty($condicao['created']) && isset($condicao['publish_down']) && !empty($condicao['publish_down'])):
                $select->where->between("{$table}.created", date('Y-m-d', strtotime($condicao['created'])), date('Y-m-d', strtotime($condicao['publish_down'])));
            endif;
            if (isset($condicao['busca']) && !empty($condicao['busca'])):
                $select->where->expression("CONCAT_WS(' ', {$table}.title, {$table}.description) LIKE ?", "%{$condicao['busca']}%");
            endif;
             $select->order("{$table}.id DESC");
            // create a new pagination adapter object
            $paginatorAdapter = new \Zend\Paginator\Adapter\DbSelect(
                    // our configured select object
                    $select,
                    // the adapter to run it against
                    $this->tableGateway->getAdapter(),
                    // the result set to hydrate
                    $this->tableGateway->getResultSetPrototype()
            );
            $paginator = new \Zend\Paginator\Paginator($paginatorAdapter);
            return $paginator;
        }
        $resultSelect = $this->tableGateway->select(function(Select $select) use ($table) {
            $select->order("{$table}.id DESC");
            if ($table != 'bs_users'):
                $select->join('bs_users', "bs_users.id = {$table}.created_by", array('Username' => 'title'));
            endif;
        });
        return $resultSelect;
    }

    /**
     * pega o nome da tabela
     * @return type
     */
    public function getTable() {
        return $this->tableGateway->getTable();
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
        try {
            $data->setCodigo($this->getMax('codigo'));
            if ($this->tableGateway->insert($data->toArray())):
                $this->result = 1;
                $this->last_insert = $this->find($this->tableGateway->getLastInsertValue());
                $this->error = "O REGISTRO [ <b>{$data->getTitle()}</b> ] FOI SALVO COM SUCESSO!";
                $this->class = "trigger_success";
                return $this->result;
            endif;
            $this->error = "Nao Foi Possivel Finalizar a Operação!";
            $this->result = FALSE;
            $this->class = "trigger_error";
        } catch (\Zend\Db\Adapter\Exception\InvalidQueryException $exc) {
            $this->error = sprintf("ERROR: %s - %s", $exc->getCode(), $exc->getMessage());
            $this->result = null;
            $this->msg.=$this->error;
        }
        return $this->result;
    }

    /**
     * Atualiza um registro passando uma model como paramentro
     * @param \Base\Model\AbstractModel $data
     * @return boolean
     */
    public function update(AbstractModel $data) {
        //Verifica se o registro existe no banco
        try {
            $oldData = $this->find($data->getId());
            if ($oldData) {
                $this->result = $this->tableGateway->update($data->toArray(), ['id' => $data->getId()]);
                if ($this->result) {
                    $this->error = "O REGISTRO [ <b>{$oldData->getTitle()}</b> ] FOI ATUALIZADO COM SUCESSO!";
                    $this->last_insert = $this->find($data->getId());
                    $this->class = "trigger_success";
                } else {
                    $this->error = "NÃO FOI POSSIVEL CONCLUIR A SUA SOLISITAÇÃO, NENHUMA ALTERAÇÃO FOI DETECTADA NO REGISTRO [ <b>{$oldData->getTitle()}</b> ]!";
                }
                return $this->result;
            }
            $this->error = "NÃO FOI POSSIVEL CONCLUIR A SUA SOLISITAÇÃO, POR QUE NENHUM REGISTRO CORRESPONDENTE FOI ENCONTRADO!!";
            $this->result = FALSE;
            $this->class = "trigger_error";
        } catch (\Zend\Db\Adapter\Exception\InvalidQueryException $exc) {
            $this->error = sprintf("ERROR: %s - %s", $exc->getCode(), $exc->getMessage());
            $this->result = null;
            $this->msg.=$this->error;
        }
        return $this->result;
    }

    /**
     * Excluir um registro do banco passando id como parametro
     * @param type $id
     * @return type bool
     */
    public function delete($id) {
        try {
            $oldData = $this->find($id);
            if ($oldData) {
                if ($this->tableGateway->delete(array('id' => $id))) {
                    $this->result = TRUE;
                    $this->error = "O REGISTRO [ <b>{$oldData->getTitle()}</b> ] FOI EXCLUIDO COM SUCESSO!";
                    $this->class = "trigger_success";
                    $this->last_insert=TRUE;
                    return $this->result;
                    
                }
            }
            $this->error = "NÃO FOI POSSIVEL CONCLUIR A SUA SOLISITAÇÃO, POR QUE NENHUM REGISTRO CORRESPONDENTE FOI ENCONTRADO!!";
            $this->result = FALSE;
            $this->class = "trigger_error";
            return $this->result;
        } catch (\Zend\Db\Adapter\Exception\InvalidQueryException $exc) {
            $this->error = sprintf("ERROR: %s - %s", $exc->getCode(), $exc->getMessage());
            $this->result = null;
            $this->msg.=$this->error;
            return $this->result;
        }
    }

    /**
     * Excluir um registro do banco passando id como parametro
     * @param type $id
     * @return type bool
     */
    public function deleteBy($by = array()) {
        try {
            $oldData = $this->findBy($by);
            if ($oldData) {
                if ($this->tableGateway->delete($by)) {
                    $this->result = TRUE;
                    $this->error = "O REGISTRO FOI EXCLUIDO COM SUCESSO!";
                    $this->class = "trigger_success";
                    return $this->result;
                }
            }
            $this->error = "NÃO FOI POSSIVEL CONCLUIR A SUA SOLISITAÇÃO, POR QUE NENHUM REGISTRO CORRESPONDENTE FOI ENCONTRADO!!";
            $this->result = TRUE;
            $this->class = "trigger_success";
            return $this->result;
        } catch (\Zend\Db\Adapter\Exception\InvalidQueryException $exc) {
            $this->error = sprintf("ERROR: %s - %s", $exc->getCode(), $exc->getMessage());
            $this->result = null;
            $this->msg.=$this->error;
            return $this->result;
        }
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

    public function getError() {
        return $this->error;
    }

    public function getResult() {
        return $this->result;
    }

    public function getLastInsert() {
        return $this->last_insert;
    }

    public function getClass() {
        return $this->class;
    }

    public function getTableGateway() {
        return $this->tableGateway;
    }

}
