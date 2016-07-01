<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Admin\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Admin\Model\BsProdutosTable;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class BsProdutosFactoryTable implements FactoryInterface
{

    /**
     * createService Factory Model
     *
     * @return createService
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        // Configurações iniciais do Factory Table
        $tableGateway = $serviceLocator->get("BsProdutosTableGateway");
        return new BsProdutosTable($tableGateway);
    }


}