<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Admin\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Admin\Form\BsFornecedoresForm;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class BsFornecedoresFormFactory implements FactoryInterface
{

    /**
     * createService Factory
     *
     * @return createService
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new BsFornecedoresForm($serviceLocator);
    }


}