<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Model;

use Zend\Db\TableGateway\TableGateway;

/**
 * Description of BsUsersTable
 *
 * @author Ale
 */
class ProfileTable extends \Base\Model\AbstractTable {

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

}
