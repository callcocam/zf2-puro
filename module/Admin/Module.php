<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin;

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
                'Admin\Model\BsUsersTable' => function ($sm) {
                    $tableGateway = $sm->get('BsUsersTableGateway');
                    $table = new \Admin\Model\BsUsersTable($tableGateway);
                    return $table;
                },
                'BsUsersTableGateway' => function ($sm) {
                    $resultSetPrototype = $sm->get('resultSetPrototype');
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype->setArrayObjectPrototype(new \Admin\Model\BsUsers());
                    return new \Zend\Db\TableGateway\TableGateway("bs_users", $dbAdapter, NULL, $resultSetPrototype);
                },
                'Admin\Model\BsUsers' => function() {
                    return new \Admin\Model\BsUsers();
                },
                'Admin\Model\BsCategoriasTable' => function ($sm) {
                    $tableGateway = $sm->get('BsCategoriasTableGateway');
                    $table = new \Admin\Model\BsCategoriasTable($tableGateway);
                    return $table;
                },
                'BsCategoriasTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = $sm->get('resultSetPrototype');
                    $resultSetPrototype->setArrayObjectPrototype(new \Admin\Model\BsCategorias());
                    return new \Zend\Db\TableGateway\TableGateway("bs_categorias", $dbAdapter, NULL, $resultSetPrototype);
                },
                'Admin\Model\BsCategorias' => function() {
                    return new \Admin\Model\BsCategorias();
                }
            )
        );
    }

}
