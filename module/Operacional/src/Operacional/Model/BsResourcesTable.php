<?php
namespace Operacional\Model;
/**
 * Class [TIPO]
 */

/**
 * Description of BsResourcesTable
 *
 * @author Claudio
 * @copyright (c) year, Claudio Campos
 */
class BsResourcesTable extends \Base\Model\AbstractTable {
    public function __construct(\Zend\Db\TableGateway\TableGateway $tableGateway) {
        $this->tableGateway=$tableGateway;
    }
}
