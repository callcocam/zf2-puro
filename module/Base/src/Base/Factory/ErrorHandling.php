<?php

namespace Base\Factory;

use Base\Service\ErrorHandling as ServiceErrorHandling;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;

class ErrorHandling implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $logger = $serviceLocator->get('log');
        $serviceLog = new ServiceErrorHandling($serviceLocator, $logger);
        
        return $serviceLog;
    }
}