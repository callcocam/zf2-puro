<?php
namespace Operacional\Factory;
/**
 * ResourcesFactory [TIPO]
 *
 * @copyright (c) year, Claudio Coelho
 */
class ResourcesFactory implements \Zend\ServiceManager\FactoryInterface{
    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator) {
        return new \Operacional\Form\BsResourcesForm($serviceLocator);
    }
}
