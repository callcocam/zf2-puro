<?php
namespace Auth\Factory;
/**
 * Class [TIPO]
 */

/**
 * Description of BsUsersUpdateForm
 *
 * @author Claudio
 * @copyright (c) year, Claudio Campos
 */
class BsUsersUpdateFormFactory implements \Zend\ServiceManager\FactoryInterface{
    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator) {
        return new \Auth\Form\BsUsersUpdateForm($serviceLocator);
    }

}
