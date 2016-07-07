<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Auth\Model;

use Zend\Db\TableGateway\TableGateway;

/**
 * Description of BsUsersTable
 *
 * @author Ale
 */
class BsUsersTable extends \Base\Model\AbstractTable {

   

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }
    

    public function getUserByToken($token) {
        $rowset = $this->tableGateway->select(array('usr_registration_token' => $token));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $token");
        }
        return $row;
    }

    public function activateUser($usr_id) {
        $data['state'] = 0;
        $this->tableGateway->update($data, array('id' => (int) $usr_id));
    }

    public function getUserByEmail($usr_email) {
        $rowset = $this->tableGateway->select(array('email' => $usr_email));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $usr_email");
        }
        return $row;
    }

    public function changePassword($usr_id, $password) {
        $data['password'] = $password;
        $this->tableGateway->update($data, array('id' => (int) $usr_id));
    }

}
