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
                'Admin\Model\BsResourcesTable' => function ($sm) {
                    $tableGateway = $sm->get('BsResourcesTableGateway');
                    return new \Admin\Model\BsResourcesTable($tableGateway);
                },
                'BsResourcesTableGateway' => function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = $sm->get('resultSetPrototype');
                    $resultSetPrototype->setArrayObjectPrototype(new \Admin\Model\BsResources());
                    return new TableGateway('bs_resources', $dbAdapter, NULL, $resultSetPrototype);
                },
                'Admin\Model\BsElementsTable' => function ($sm) {
                    $tableGateway = $sm->get('BsElementsTableGateway');
                    return new \Admin\Model\BsElementsTable($tableGateway);
                },
                'BsElementsTableGateway' => function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = $sm->get('resultSetPrototype');
                    $resultSetPrototype->setArrayObjectPrototype(new \Admin\Model\BsElements());
                    return new TableGateway('bs_elements', $dbAdapter, NULL, $resultSetPrototype);
                }
            ),
            'invokables' => array(
                'Admin\Model\BsResources' => 'Admin\Model\BsResources',
                'Admin\Model\BsCidades' => 'Admin\Model\BsCidades',
                'Admin\Model\BsElements' => 'Admin\Model\BsElements',
            )
        );
    }

}
