<?php
namespace Auth\Factory;
/**
 * Class [TIPO]
 */

/**
 * Description of RegistrationFactory
 *
 * @author Claudio
 * @copyright (c) year, Claudio Campos
 */
class RegistrationFactory implements \Zend\ServiceManager\FactoryInterface{
    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator) {
        return new \Auth\Form\RegistrationForm($serviceLocator);
    }
}
