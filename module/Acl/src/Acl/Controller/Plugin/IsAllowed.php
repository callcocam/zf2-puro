<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Acl\Controller\Plugin;

/**
 * Description of IsAllowed
 *
 * @author Call
 */

class IsAllowed extends \Zend\Mvc\Controller\Plugin\AbstractPlugin {
    
    protected $auth;
    protected $acl;

    public function __construct($auth,$acl) {
        $this->auth = $auth;
        $this->acl = $acl;
    }
/**
 * 
 * @param type $e
 * @param type $auth
 * @return type
 * @throws \Exception
 */
    public function __invoke($e) {
       $resource=$e->getParam('controller','');
       $privilege=$e->getParam('action','');
        if ($this->auth->hasIdentity()) {
            $user = $this->auth->getIdentity();
            $role =(string)$user['role_id'];
            if (!$this->acl->hasResource($resource)) {
                throw new \Exception('Resource ' . $resource . ' not defined');
            }
            return $this->acl->isAllowed($role, $resource, $privilege);
        } else {
           return $this->acl->isAllowed(\Acl\Model\Roles::DEFAULT_ROLE, $resource, $privilege);
        }
    }

}
