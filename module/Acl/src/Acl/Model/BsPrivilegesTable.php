<?php

namespace Acl\Model;

use Zend\Db\TableGateway\TableGateway;
use Base\Model\AbstractTable;

/**
 * BsPrivilegesTable
 */
class BsPrivilegesTable extends AbstractTable {

    function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

    public function insert(\Base\Model\AbstractModel $data) {
        // NESTA CONDIÇÃO QUANDO ENCONTRADO UM OU MAIS REGISTRO RETORNA FALSO
        $validator = new \Zend\Validator\Db\NoRecordExists(array(
            'table' => $this->getTable(),
            'field' => 'resource_id',
            'adapter' => $this->tableGateway->getAdapter(),
            'exclude' => "title='{$data->getTitle()}'"
        ));
        if (!$validator->isValid('Acl\Controller\Acl')) {
            $this->result = NULL;
            $this->error = "NÃO FOI POSSIVEL CONCLUIR A SUA SOLISITAÇÃO, EXISTE UMA PERMISSÃO CADASTRADA NESSA CONDIÇÂO!!";
            return null;
        }
        return parent::insert($data);
    }

    public function update(\Base\Model\AbstractModel $data) {

        // NESTA CONDIÇÃO QUANDO ENCONTRADO UM OU MAIS REGISTRO RETORNA FALSO
        $validator = new \Zend\Validator\Db\NoRecordExists(array(
            'table' => $this->getTable(),
            'field' => 'resource_id',
            'adapter' => $this->tableGateway->getAdapter(),
            'exclude' => "title='{$data->getTitle()}' AND id<>{$data->getId()}"
        ));
        if (!$validator->isValid('Acl\Controller\Acl')) {
            $this->result = NULL;
            $this->error = "NÃO FOI POSSIVEL CONCLUIR A SUA SOLISITAÇÃO, EXISTE UMA PERMISSÃO CADASTRADA NESSA CONDIÇÂO!!";
            return null;
        }
        return parent::update($data);
    }

}
