<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/calcocam for the canonical source repository
 * @copyright Copyright (c) 2005-2016 SIGA-Smart. (http://www.sigasmart.com.br)
 */

namespace FluxoCaixa;

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
