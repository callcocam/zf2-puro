<?php

namespace Admin;

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
                'Admin\Model\BsCidadesTable' => function($sm) {
                    $tableGateway = $sm->get('BsCidadesTableGateway');
                    return new \Admin\Model\BsCidadesTable($tableGateway);
                },
                'BsCidadesTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = $sm->get('resultSetPrototype');
                    $resultSetPrototype->setArrayObjectPrototype(new \Admin\Model\BsCidades()); // Notice what is set here
                    return new TableGateway('bs_cidades', $dbAdapter, null, $resultSetPrototype);
                },
            
            ),
            'invokables' => array(
                'Admin\Model\BsCidades' => 'Admin\Model\BsCidades',
             )
        );
    }

}