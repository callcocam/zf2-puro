<?php

/**
 * Class [TIPO]
 */

namespace Operacional\Model;

/**
 * Description of BsGrupos
 *
 * @author Claudio
 * @copyright (c) year, Claudio Campos
 */
class BsGruposTable extends \Base\Model\AbstractTable {
    public function __construct(\Zend\Db\TableGateway\TableGateway $tableGateway) {
        $this->tableGateway=$tableGateway;
    }
}
