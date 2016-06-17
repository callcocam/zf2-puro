<?php

namespace Acl\Permissions;

use Zend\Permissions\Acl\Acl as ZendAcl,
    Zend\Permissions\Acl\Role\GenericRole as Role,
    Zend\Permissions\Acl\Resource\GenericResource as Resource;

/**
 * Acl
 */
class Acl extends ZendAcl {

    protected $is_admin;
    protected $parent;

    /**
     * Constructor
     *
     * @param Modulos e Privileges
     * @return void
     */
    public function __construct($resourcesModel, $privileges) {
        $resources=[];
        $invokables = $resourcesModel->getResources('invokables');
        $factories = $resourcesModel->getResources('factories');
        if($invokables):
            foreach ($invokables as $key => $value) {
                $resources[$key]=$value;
            }
        endif;
          if($factories):
            foreach ($factories as $key => $value) {
                $resources[$key]=$value;
            }
        endif;
        $roles = \Acl\Model\Roles::$ROLES;
        $this->is_admin = \Acl\Model\Roles::$IS_ADMIM;
        $this->parent = \Acl\Model\Roles::$PARENT;
        $this->_addRoles($roles)
                ->_addAclRules($resources, $privileges);
    }

    /**
     * Adds Roles to ACL
     * @param type $roles
     * @return \Acl\Permissions\Acl
     */
    protected function _addRoles($roles) {
       //Garante a ordens das roles
        krsort($roles);
        //Adidiona as roles
        foreach ($roles as $role => $value) {
            //Verifica a role ja foi add
            if (!$this->hasRole((string) $role)) {
               //Inicia os parents da role ex:1 e parent da 2 a 2 da 3 etc
                //a 1 herda da 2,3,4 e 5
                $parentNames = array();
                if (!is_null($this->parent[$role]) && (int) $this->parent[$role]) {
                    $parentNames = (string) $this->parent[$role];
                }
                //Adiciana a role
                $this->addRole(new Role((string) $role), $parentNames);
            }
            //Se a role for admin conceda totos os privileges
            if ($this->is_admin[$role]) {
                $this->allow((string) $role, array(), array());
            }
        }
        return $this;
    }

    /**
     * Adiciona os resources  e os privileges
     * @param type $resources
     * @param type $privileges
     * @return \Acl\Permissions\Acl
     */
    protected function _addAclRules($resources, $privileges) {

        foreach ($resources as $key => $resource) {

            if (!$this->hasResource($key)) {
                $this->addResource(new Resource($key));
            }
        }
        if (!$this->hasResource("Traffic\Controller\Traffic")) {
            $this->addResource(new Resource("Traffic\Controller\Traffic"));
        }

        foreach ($privileges as $privilege) {
            $this->allow((string) $privilege->getRoleId(), $privilege->getResourceId(), $privilege->getTitle());
        }
        $this->allow("3", "Traffic\Controller\Traffic", "index");

        return $this;
    }

}
