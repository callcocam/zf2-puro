<?php

/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */
// from http://framework.zend.com/manual/2.1/en/modules/zend.navigation.quick-start.html
// the array was empty before that
return array(// ToDO make it dynamic - comes from the DB
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Dashboard',
                'route' => 'admin/default',
                'controller' => 'admin',
                'action' => 'index',
                'privilege' => 'index',
                'resource' => 'Admin\Controller\Admin',
                'icone' => 'ion ion-ios-speedometer',
                'title' => 'Panel De Controle',
            ),
            array(
                'label' => 'Ir Para Site',
                'route' => 'home',
                'action' => 'index',
                'privilege' => 'index',
                'resource' => 'Home\Controller\Home',
                'icone' => 'ion ion-eye',
                'title' => 'Ir Para O Site',
                'target' => '_blank'
            ),
            array(
                'label' => 'CONFIGURAÇÕES',
                'class' => 'treeview',
                'action' => '#',
                'icone' => 'ion ion-gear-a',
                'title' => 'Grupo de suporte do sistema',
                'pages' => array(
                    array(
                        'label' => 'Confg/Empresa',
                        'route' => 'admin/default',
                        'controller' => 'bs-companies',
                        'resource' => 'Admin\Controller\BsCompanies',
                        'action' => 'index',
                        'privilege' => 'index',
                        'icone' => 'fa fa-angle-double-right',
                        'title' => '',
                    ),
                    array(
                        'label' => 'Modulos',
                        'route' => 'admin/default',
                        'controller' => 'bs-resources',
                        'resource' => 'Admin\Controller\BsResources',
                        'action' => 'index',
                        'privilege' => 'index',
                        'icone' => 'fa fa-angle-double-right',
                        'title' => '',
                    ),
                    array(
                        'label' => 'Privilegios',
                        'route' => 'acl/default',
                        'controller' => 'acl',
                        'resource' => 'Acl\Controller\Acl',
                        'action' => 'index',
                        'privilege' => 'index',
                        'icone' => 'fa fa-angle-double-right',
                        'title' => '',
                    ),
                    array(
                        'label' => 'Usuarios',
                        'route' => 'auth/default',
                        'controller' => 'admin',
                        'resource' => 'Auth\Controller\Admin',
                        'action' => 'index',
                        'privilege' => 'index',
                        'icone' => 'fa fa-angle-double-right',
                        'title' => '',
                    ),
                )
            ),
            array(
                'label' => 'Sair',
                'route' => 'auth/default',
                'controller' => 'login',
                'action' => 'logout',
                'privilege' => 'logout',
                'resource' => 'Auth\Controller\Login',
                'icone' => 'ion ion-gear-a',
                'title' => 'Grupo de suporte do sistema',
            )
        ),
        'secondary' => array(
            array(
                'label' => 'Home',
                'route' => 'home',
                'class' => 'item-1', // with the help of ->setAddClassToListItem(true) the class will be moved to li or a tags
                'anchor_class' => "mmhome",
            ),
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
            'secondary_navigation' => 'Navigation\Navigation\Service\SecondaryNavigationFactory',
        ),
    ),
);

/*
action	String	NULL	Action name to use when generating href to the page.
controller	String	NULL	Controller name to use when generating href to the page.
params	Array	array()	User params to use when generating href to the page.
route	String	NULL	Route name to use when generating href to the page.
routeMatch	Zend\Mvc\Router\RouteMatch	NULL	RouteInterface matches used for routing parameters and testing validity.
router	Zend\Mvc\Router\RouteStackInterface	NULL	Router for assembling URLs
*/