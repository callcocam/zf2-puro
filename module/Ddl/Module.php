<?php

namespace Ddl;

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
                'CreateTableForm' => function ($sm) {
                    return new \Ddl\Form\CreateTableForm($sm);
                },
                'ColumnChangeForm' => function ($sm) {
                    return new \Ddl\Form\ColumnChangeForm($sm);
                },
                'ColumnForm' => function ($sm) {
                    return new \Ddl\Form\ColumnForm($sm);
                },
               ),
            'invokables' => array(
            )
        );
    }

}
