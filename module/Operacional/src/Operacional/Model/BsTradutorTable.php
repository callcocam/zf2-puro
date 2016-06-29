<?php

/**
 * Class [TIPO]
 */

namespace Operacional\Model;

/**
 * Description of BsCidadesTable
 *
 * @author Claudio
 * @copyright (c) year, Claudio Campos
 */
class BsTradutorTable extends \Base\Model\AbstractTable {
    public function __construct(\Zend\Db\TableGateway\TableGateway $tableGateway) {
        $this->tableGateway=$tableGateway;
    }
   
}
