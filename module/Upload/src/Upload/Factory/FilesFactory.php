<?php

namespace Upload\Factory;

/**
 * FilesFactory [TIPO]
 *
 * @copyright (c) year, Claudio Coelho
 */
class FilesFactory implements \Zend\ServiceManager\FactoryInterface {

    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator) {
        return new \Upload\Controller\UploadController($serviceLocator->getServiceLocator()->get("Upload\Files\FilesService"));
    }

}
