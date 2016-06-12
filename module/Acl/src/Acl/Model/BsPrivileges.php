<?php 
namespace Acl\Model;

use Base\Model\AbstractModel;
/**
* BsPrivileges
*/
class BsPrivileges extends AbstractModel
{

    protected $role_id;
    protected $resource_id;
    function getRoleId() {
        return $this->role_id;
    }

    function getResourceId() {
        return $this->resource_id;
    }

    function setRoleId($role_id) {
        $this->role_id = $role_id;
    }

    function setResourceId($resource_id) {
        $this->resource_id = $resource_id;
    }


}