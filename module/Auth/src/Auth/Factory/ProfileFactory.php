<?php
namespace Auth\Factory;
/**
 * Class [TIPO]
 */

/**
 * Description of ProfileFactory
 *
 * @author Claudio
 * @copyright (c) year, Claudio Campos
 */
class ProfileFactory implements \Zend\ServiceManager\FactoryInterface{
    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator) {
        return new \Auth\Form\ProfileForm($serviceLocator);
    }

}
