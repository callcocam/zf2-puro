<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Admin\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Admin\Model\BsCategoriasTable;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class BsCategoriasFactoryTable implements FactoryInterface
{

    /**
     * createService Factory Model
     *
     * @return createService
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        // Configurações iniciais do Factory Table
        $tableGateway = $serviceLocator->get("BsCategoriasTableGateway");
        return new BsCategoriasTable($tableGateway);
    }


}