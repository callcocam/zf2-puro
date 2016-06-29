<?php
namespace Auth\Factory;
/**
 * Class [TIPO]
 */

/**
 * Description of AuthFactory
 *
 * @author Claudio
 * @copyright (c) year, Claudio Campos
 */
class AuthFormFactory implements \Zend\ServiceManager\FactoryInterface {
    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator) {
        return new \Auth\Form\AuthForm($serviceLocator);
    }

//put your code here
}
