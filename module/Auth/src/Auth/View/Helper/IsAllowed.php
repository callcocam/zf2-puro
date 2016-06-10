<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Auth\View\Helper;

/**
 * Description of IsAllowed
 *
 * @author Call
 */


use Zend\View\Helper\AbstractHelper;

class IsAllowed extends AbstractHelper {
    
    protected $auth;
    protected $acl;

    public function __construct($auth, $acl) {
        $this->auth = $auth;
        $this->acl = $acl;
    }

    /**
     * Checks whether the current user has acces to a resource.
     * 
     * @param string $resource
     * @param string $privilege
     */
    public function __invoke($resource, $privilege = null) {
        if ($this->auth->hasIdentity()) {
            $user = $this->auth->getIdentity();
            $role =(string)$user['role_id'];
            if (!$this->acl->hasResource($resource)) {
                throw new \Exception('Resource ' . $resource . ' not defined');
            }
            return $this->acl->isAllowed($role, $resource, $privilege);
        } else {
           
            return $this->acl->isAllowed(\Auth\Acl\AclDb::DEFAULT_ROLE, $resource, $privilege);
        }
    }

}
