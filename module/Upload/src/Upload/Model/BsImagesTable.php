<?php

namespace Upload\Model;

/**
 * BsImages [TIPO]
 *
 * @copyright (c) year, Claudio Coelho
 */
class BsImagesTable extends \Base\Model\AbstractTable {

    public function __construct(\Zend\Db\TableGateway\TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

}
