<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/calcocam for the canonical source repository
 * @copyright Copyright (c) 2005-2016 SIGA-Smart. (http://www.sigasmart.com.br)
 */

namespace ZenCode;

use Zend\Db\TableGateway\TableGateway;

class Module {

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
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
                'FormularioForm' => function ($sm) {
                    return new Form\FormularioForm($sm);
                },
                'ModelForm' => function ($sm) {
                    return new Form\ModelForm($sm);
                },
                'TableForm' => function ($sm) {
                    return new Form\TableForm($sm);
                },
                'FilterForm' => function ($sm) {
                    return new Form\FilterForm($sm);
                },
               'ZenCode\Model\BsResourcesTable' => function($sm) {
                    $tableGateway = $sm->get('BsResourcesTableGateway');
                    return new \ZenCode\Model\BsResourcesTable($tableGateway);
                },
                'ZenCode\Services\GerarView' => function($sm) {
                    return new \ZenCode\Services\GerarView($sm);
                }
            ),
            'invokables' => array(
            )
        );
    }

}
