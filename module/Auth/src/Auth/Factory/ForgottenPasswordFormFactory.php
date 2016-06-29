<?php
namespace Auth\Factory;
/**
 * Class [TIPO]
 */

/**
 * Description of ForgottenPasswordFactory
 *
 * @author Claudio
 * @copyright (c) 2016, Claudio Campos
 */
class ForgottenPasswordFormFactory implements \Zend\ServiceManager\FactoryInterface{
    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator) {
        return new \Auth\Form\ForgottenPasswordForm($serviceLocator);
    }

}
