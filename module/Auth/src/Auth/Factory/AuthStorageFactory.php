<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Auth\Factory;
use Zend\ServiceManager\ServiceLocatorInterface;
/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class AuthStorageFactory implements \Zend\ServiceManager\FactoryInterface
{

    /**
     * createService Factory AuthStorage
     *
     * @return createService
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new \Auth\Model\AuthStorage('zf_tutorial');
    }

}