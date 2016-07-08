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
    protected $table;
    protected $limit = 50;
    protected $offset = 0;
    protected $joins = array();
    protected $columns = array();
    protected $error;
    protected $result;
    protected $last_insert;
    protected $class;
    protected $msg;
    protected $extraWere = array();
    protected $from = array();
    protected $group = null;
    protected $order = null;
    protected $distinct = null;

    abstract function __construct(TableGateway $tableGateway);

    /**
     * Busca todos os regstros do banco sem nenhuma restrição
     * @return type object table bd
     */
    public function findALL($condicao = array('state' => '0'), $paginated = true) {
        //pegamos a tabela principal
        $table = $this->tableGateway->getTable();
        //abrir zend db sql e iniciar um select
        $select = $this->tableGateway->getSql()->select();
        if ($this->columns):
            $select->columns($this->columns);
        // 
        endif;
        //unir com a tabella de usuario
        $select->join(array('user' => 'bs_users'), "{$table}.modified_by=user.id ", array('editor_by' => 'title'), 'left');
        //verificar e monta as união de tabelas vindas de sua table real
        if ($this->joins):
            foreach ($this->joins as $j):
                $select->join($j['tabela'], $j['w'], $j['c'], $j['predicate']);
            endforeach;
        endif;

        if (isset($condicao['busca'])):
            $select->where($this->filtro($condicao, $table));
        else:
            if ($condicao):
                foreach ($condicao as $key => $value) {
                    $select->where(array("{$table}.{$key}" => $value));
                }
            endif;
        endif;
        if ($this->extraWere):
            foreach ($this->extraWere as $w):
                $select->where($w);
            endforeach;
        endif;
        if (!empty($this->group)):
            $select->group($this->group);
        endif;
        if (!empty($this->order)):
            $select->order($this->order);
        endif;
        if (!empty($this->distinct)):
            $select->quantifier($this->distinct);
        endif;
//        echo "<pre>{$select->getSqlString($this->getTableGateway()->getAdapter()->getPlatform())}</pre>";
        $statement = $this->tableGateway->getSql()->prepareStatementForSqlObject($select);
        $results = $statement->execute();
        $resultSet = new \Zend\Db\ResultSet\ResultSet(); //$this->tableGateway->getResultSetPrototype();
        $resultSet->initialize($results);
        $paginator = new \Zend\Paginator\Paginator(new
                \Zend\Paginator\Adapter\ArrayAdapter($resultSet->toArray())
        );
        return $paginator;
    }

    protected function filtro($condicao, $table) {

        $where = new \Zend\Db\Sql\Where();
        if (isset($condicao['state'])):
            $operator=$condicao['state']>=0?"=":">";
            $where->addPredicate(new \Zend\Db\Sql\Predicate\Operator("{$table}.state", $operator,$condicao['state']));
        endif;

        if (isset($condicao['created']) && !empty($condicao['created']) && isset($condicao['publish_down']) && empty($condicao['publish_down'])):
            $where->equalTo("{$table}.publish_up", date('Y-m-d 00:00:00', strtotime($condicao['created'])));
        elseif (isset($condicao['created']) && !empty($condicao['created']) && isset($condicao['publish_down']) && !empty($condicao['publish_down'])):
            $where->between("{$table}.publish_up", date('Y-m-d', strtotime($condicao['created'])), date('Y-m-d', strtotime($condicao['publish_down'])));
        endif;
        if (isset($condicao['busca']) && !empty($condicao['busca'])):
            $where->expression("CONCAT_WS(' ', {$table}.title, {$table}.description) LIKE ?", "%{$condicao['busca']}%");
        endif;
        return $where;
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
                    $this->last_insert = TRUE;
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

    public function getSqlPerson($table, $condicao = array('state' => 0),$columns=array("*")) {
        $sql = new \Zend\Db\Sql\Sql($this->tableGateway->getAdapter());
        $select = $sql->select();
        $select->from($table);
        $select->columns($columns);
        $select->where($condicao);
        $statement = $sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();
        return $results->current();
    }
    
    public function getSqlPersonItem($table, $condicao = array('state' => 0),$columns=array("*"),$fild='id') {
        $sql = new \Zend\Db\Sql\Sql($this->tableGateway->getAdapter());
        $select = $sql->select();
        $select->from($table);
        $select->columns($columns);
        $select->where($condicao);
        $statement = $sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();
        $item=$results->current();
        return $item[$fild];
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
