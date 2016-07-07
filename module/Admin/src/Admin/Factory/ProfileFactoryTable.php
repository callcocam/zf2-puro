<?php

/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */

namespace Admin\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Admin\Model\ProfileTable;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class ProfileFactoryTable implements FactoryInterface {

    /**
     * createService Factory Model
     *
     * @return createService
     */
    public function createService(ServiceLocatorInterface $serviceLocator) {
        // Configurações iniciais do Factory Table
        $tableGateway = $serviceLocator->get("ProfileTableGateway");
        return new ProfileTable($tableGateway);
    }

}
