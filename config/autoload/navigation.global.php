<?php

$defaul = [];


$secondaryDinamico = require_once('navigation.site.php');
if ($secondaryDinamico):
    foreach ($secondaryDinamico as $key => $value) {
        $secondary[] = $value;
    }
endif;
$admin[] = array(
    'label' => 'Dashboard',
    'route' => 'admin/default',
    'controller' => 'admin',
    'action' => 'index',
    'privilege' => 'index',
    'resource' => 'Admin\Controller\Admin',
    'icone' => 'ion ion-ios-speedometer',
    'title' => 'Panel De Controle',
);
$admin[] = array(
    'label' => 'Ir Para Site',
    'route' => 'home',
    'action' => 'index',
    'privilege' => 'index',
    'resource' => 'Home\Controller\Home',
    'icone' => 'ion ion-eye',
    'title' => 'Ir Para O Site',
    'target' => '_blank'
);

$adminDinamico = require_once('navigation.admin.php');
if ($adminDinamico):
    foreach ($adminDinamico as $key => $value) {
        $admin[] = $value;
    }
endif;

$admin[] = array(
    'label' => 'CONTROLE/ACESSO',
    'class' => 'treeview',
    'action' => '#',
    'icone' => 'ion ion-android-unlock',
    'title' => 'Grupo Controle De Acesso',
    'pages' => array(
        array(
            'label' => 'Privilegios',
            'route' => 'acl/default',
            'controller' => 'acl',
            'resource' => 'Acl\Controller\Acl',
            'action' => 'index',
            'privilege' => 'index',
            'icone' => 'ion ion-key',
            'title' => '',
            'pages' => array(
                array(
                    'label' => 'Cadastrar',
                    'route' => 'acl/default',
                    'controller' => 'acl',
                    'resource' => 'Acl\Controller\Acl',
                    'action' => 'inserir',
                    'privilege' => 'inserir',
                    'title' => 'Cadastrar Registro',
                ),
                array(
                    'label' => 'Editar',
                    'route' => 'acl/default',
                    'controller' => 'acl',
                    'resource' => 'Acl\Controller\Acl',
                    'action' => 'editar',
                    'privilege' => 'editar',
                    'title' => 'Editar Registro',
                )
            )
        ),
        array(
            'label' => 'Usuarios',
            'route' => 'admin/default',
            'controller' => 'bs-users',
            'resource' => 'Admin\Controller\BsUsers',
            'action' => 'index',
            'privilege' => 'index',
            'icone' => 'ion ion-ios-people',
            'title' => '',
            'pages' => array(
                array(
                    'label' => 'Cadastrar',
                    'route' => 'admin/default',
                    'controller' => 'bs-users',
                    'resource' => 'Admin\Controller\BsUsers',
                    'action' => 'inserir',
                    'privilege' => 'inserir',
                    'title' => 'Cadastrar Registro',
                ),
                array(
                    'label' => 'Editar',
                    'route' => 'admin/default',
                    'controller' => 'bs-users',
                    'resource' => 'Admin\Controller\BsUsers',
                    'action' => 'editar',
                    'privilege' => 'editar',
                    'title' => 'Editar Registro',
                )
            )
        ),
    ),
);
$admin[] = array(
    'label' => 'CONFIGURAÇÕES',
    'class' => 'treeview',
    'action' => '#',
    'icone' => 'ion ion-gear-a',
    'title' => 'Grupo de suporte do sistema',
    'pages' => array(
        array(
            'label' => 'Confg/Empresa',
            'route' => 'operacional/default',
            'controller' => 'bs-companies',
            'resource' => 'Operacional\Controller\BsCompanies',
            'action' => 'index',
            'privilege' => 'index',
            'icone' => 'ion ion-android-home',
            'title' => 'Cofiguraçãoda empresa',
            'pages' => array(
                array(
                    'label' => 'Cadastrar',
                    'route' => 'operacional/default',
                    'controller' => 'bs-companies',
                    'resource' => 'Operacional\Controller\BsCompanies',
                    'action' => 'inserir',
                    'privilege' => 'inserir',
                    'title' => 'Cadastrar Registro',
                ),
                array(
                    'label' => 'Editar',
                    'route' => 'operacional/default',
                    'controller' => 'bs-companies',
                    'resource' => 'Operacional\Controller\BsCompanies',
                    'action' => 'editar',
                    'privilege' => 'editar',
                    'title' => 'Editar Registro',
                )
            )
        ),
        array(
            'label' => 'Tradutor',
            'route' => 'operacional/default',
            'controller' => 'bs-tradutor',
            'resource' => 'Operacional\Controller\BsTradutor',
            'action' => 'index',
            'privilege' => 'index',
            'icone' => 'ion ion-android-home',
            'title' => 'Tradutor Admin',
            'pages' => array(
                array(
                    'label' => 'Cadastrar',
                    'route' => 'operacional/default',
                    'controller' => 'bs-tradutor',
                    'resource' => 'Operacional\Controller\BsTradutor',
                    'action' => 'inserir',
                    'privilege' => 'inserir',
                    'title' => 'Cadastrar Registro',
                ),
                array(
                    'label' => 'Editar',
                    'route' => 'operacional/default',
                    'controller' => 'bs-tradutor',
                    'resource' => 'Operacional\Controller\BsTradutor',
                    'action' => 'editar',
                    'privilege' => 'editar',
                    'title' => 'Editar Registro',
                )
            )
        ),
        array(
            'label' => 'Upload',
            'route' => 'upload/default',
            'controller' => 'upload',
            'resource' => 'Upload\Controller\Upload',
            'action' => 'index',
            'privilege' => 'index',
            'icone' => 'ion ion-android-upload',
            'title' => 'Modulo de Uploads',
        ),
    )
);
$admin[] = array(
    'label' => 'SUPORTE/MANUTEÇÃO',
    'class' => 'treeview',
    'action' => '#',
    'icone' => 'ion ion-wrench',
    'title' => 'Grupo de suporte do sistema',
    'pages' => array(
        array(
            'label' => 'Grupos',
            'route' => 'operacional/default',
            'controller' => 'bs-grupos',
            'resource' => 'Operacional\Controller\BsGrupos',
            'action' => 'index',
            'privilege' => 'index',
            'icone' => 'ion ion-android-options',
            'title' => 'Modulo Criação de grupos',
            'pages' => array(
                array(
                    'label' => 'Cadastrar',
                    'route' => 'operacional/default',
                    'controller' => 'bs-grupos',
                    'resource' => 'Operacional\Controller\BsGrupos',
                    'action' => 'inserir',
                    'privilege' => 'inserir',
                    'title' => 'Cadastrar Registro',
                ),
                array(
                    'label' => 'Editar',
                    'route' => 'operacional/default',
                    'controller' => 'bs-grupos',
                    'resource' => 'Operacional\Controller\BsGrupos',
                    'action' => 'editar',
                    'privilege' => 'editar',
                    'title' => 'Editar Registro',
                )
            )
        ),
        array(
            'label' => 'Ddl',
            'route' => 'ddl/default',
            'controller' => 'ddl',
            'resource' => 'Auth\Controller\Admin',
            'action' => 'index',
            'privilege' => 'index',
            'icone' => 'ion ion-android-options',
            'title' => 'Modulo Manutenção do BD',
        ),
        array(
            'label' => 'Modulos',
            'route' => 'operacional/default',
            'controller' => 'bs-resources',
            'resource' => 'Operacional\Controller\BsResources',
            'action' => 'index',
            'privilege' => 'index',
            'icone' => 'ion ion-android-options',
            'title' => 'Modulos',
            'pages' => array(
                array(
                    'label' => 'Cadastrar',
                    'route' => 'operacional/default',
                    'controller' => 'bs-resources',
                    'resource' => 'Operacional\Controller\BsResources',
                    'action' => 'inserir',
                    'privilege' => 'inserir',
                    'title' => 'Cadastrar Registro',
                ),
                array(
                    'label' => 'Editar',
                    'route' => 'operacional/default',
                    'controller' => 'bs-resources',
                    'resource' => 'Operacional\Controller\BsResources',
                    'action' => 'editar',
                    'privilege' => 'editar',
                    'title' => 'Editar Registro',
                )
            )
        ),
        array(
            'label' => 'Zen Code',
            'route' => 'zen-code/default',
            'controller' => 'zen-code',
            'resource' => 'ZenCode\Controller\ZenCode',
            'action' => 'index',
            'privilege' => 'index',
            'icone' => 'ion ion-code',
            'title' => 'Zen Code',
        ),
    ),
);
$admin[] = array(
    'label' => 'Sair',
    'route' => 'auth/default',
    'controller' => 'login',
    'action' => 'logout',
    'privilege' => 'logout',
    'resource' => 'Auth\Controller\Login',
    'icone' => 'ion ion-gear-a',
    'title' => 'Grupo de suporte do sistema',
);

if ($admin):
    foreach ($admin as $key => $value) {
        $defaul[] = $value;
    }
endif;


$navigation['default'] = $defaul;
$navigation['secondary'] = $secondary;
//Zend\Debug\Debug::dump(require_once('navigation.admin.php'));die;
return array(// ToDO make it dynamic - comes from the DB
    'navigation' => $navigation);
/*
action	String	NULL	Action name to use when generating href to the page.
controller	String	NULL	Controller name to use when generating href to the page.
params	Array	array()	User params to use when generating href to the page.
route	String	NULL	Route name to use when generating href to the page.
routeMatch	Zend\Mvc\Router\RouteMatch	NULL	RouteInterface matches used for routing parameters and testing validity.
router	Zend\Mvc\Router\RouteStackInterface	NULL	Router for assembling URLs
*/