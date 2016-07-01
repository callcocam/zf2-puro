<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace FluxoCaixa\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use FluxoCaixa\Model\BsBancosTable;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class BsBancosFactoryTable implements FactoryInterface
{

    /**
     * createService Factory Model
     *
     * @return createService
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        // Configurações iniciais do Factory Table
        $tableGateway = $serviceLocator->get("BsBancosTableGateway");
        return new BsBancosTable($tableGateway);
    }


}