<?php
namespace Auth\Factory;
/**
 * Class [TIPO]
 */

/**
 * Description of BsUsersFactory
 *
 * @author Claudio
 * @copyright (c) year, Claudio Campos
 */
class BsUsersCreateFormFactory implements \Zend\ServiceManager\FactoryInterface{
   
    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator) {
        
        return new \Auth\Form\BsUsersCreateForm($serviceLocator);
    }

}
