<?php

namespace Admin;

use Zend\Db\TableGateway\TableGateway;

class Module {

    public function getConfig() {
         if(file_exists(__DIR__ . '/config/module.config.php')):
        return include __DIR__ . '/config/module.config.php';
        endif;
        return [];
    }

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig() {
        return array(
            'factories' => array(
               
            
            ),
            'invokables' => array(
               
             )
        );
    }

}