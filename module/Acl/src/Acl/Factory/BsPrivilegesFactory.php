<?php
namespace Acl\Factory;
/**
 * BsPrivilegesFactory [TIPO]
 *
 * @copyright (c) 2016, Claudio Coelho
 */
class BsPrivilegesFactory implements \Zend\ServiceManager\FactoryInterface {
    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator) {
        return new \Acl\Form\BsPrivilegesForm($serviceLocator);
    }
    
}
