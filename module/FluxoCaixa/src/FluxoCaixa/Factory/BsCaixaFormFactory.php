<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace FluxoCaixa\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use FluxoCaixa\Form\BsCaixaForm;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class BsCaixaFormFactory implements FactoryInterface
{

    /**
     * createService Factory
     *
     * @return createService
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new BsCaixaForm($serviceLocator);
    }


}