<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Admin\Factory;

use Base\Factory\AbstractFactory;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class BsContasPagarFactory extends AbstractFactory
{

    /**
     * createService Factory Model
     *
     * @return createService
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        // Configurações iniciais do Factory Model
        $this->tabela="bs_contas_pagar";
        $this->model="Admin\Model\BsContasPagar";
        return parent::createService($serviceLocator);
    }


}