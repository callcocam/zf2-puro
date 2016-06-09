<?php

/**
 * BsCompanies [TIPO]
 *
 * @copyright (c) year, Claudio Coelho
 */

namespace Admin\Model;

/**
 * Description of BsCompaniesTable
 *
 * @author Call
 */
class BsCompaniesTable extends \Base\Model\AbstractTable {

    public function __construct(\Zend\Db\TableGateway\TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

}
