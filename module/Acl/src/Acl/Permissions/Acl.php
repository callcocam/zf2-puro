<?php 
namespace Acl\Permissions;

use Zend\Permissions\Acl\Acl as ZendAcl,
    Zend\Permissions\Acl\Role\GenericRole as Role,
    Zend\Permissions\Acl\Resource\GenericResource as Resource;
/**
* Acl
*/
class Acl extends ZendAcl
{

	 protected $is_admin;
	 protected $parent;
         /**
     * Constructor
     *
     * @param Modulos e Privileges
     * @return void
     */
    public function __construct($resources,$privileges) {
        $roles = \Acl\Model\Roles::$ROLES;
        $resources =$resources->getResources();
        $this->is_admin=\Acl\Model\Roles::$IS_ADMIM;
        $this->parent=\Acl\Model\Roles::$PARENT;
        $this->_addRoles($roles)
                ->_addAclRules($resources, $privileges);
    }

    /**
     * Adds Roles to ACL
     *
     * @param array $roles
     * @return Auth\Acl\AclDb
     */
    protected function _addRoles($roles) {
        krsort($roles);
        //\Base\Model\Check::debug($roles);die;
        foreach ($roles as $role => $value) {

            if (!$this->hasRole((string) $role)) {
                $parentNames = array();
                if (!is_null($this->parent[$role]) && (int) $this->parent[$role]) {
                    $parentNames = (string) $this->parent[$role];
                }
                $this->addRole(new Role((string) $role), $parentNames);
            }
            if ($this->is_admin[$role]) {
               $this->allow((string) $role, array(), array());
            }
        }
        return $this;
    }

    /**
     * Adds Resources/privileges to ACL
     *
     * @param $resources
     * @param $privileges
     * @return User\Acl
     * @throws \Exception
     */
    protected function _addAclRules($resources, $privileges) {
        $trataResources = array();
        foreach ($resources as $key => $resource) {
          
            if (!$this->hasResource($key)) {
                $this->addResource(new Resource($key));
            }
        }
        if (!$this->hasResource("Traffic\Controller\Traffic")) {
            $this->addResource(new Resource("Traffic\Controller\Traffic"));
        }

        foreach ($privileges as $privilege) {
                  $this->allow((string) $privilege->getRoleId(),$privilege->getResourceId(), $privilege->getTitle());
                    }
        $this->allow("3", "Traffic\Controller\Traffic", "index");

        return $this;
    }

}
