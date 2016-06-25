<?php

namespace Operacional;

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
                 'Table' => function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new \Base\MetaData\Table($dbAdapter);
                    return $table;
                },
                 'Operacional\Model\BsCidadesTable' => function($sm) {
                    $tableGateway = $sm->get('BsCidadesTableGateway');
                    return new \Operacional\Model\BsCidadesTable($tableGateway);
                },
                'BsCidadesTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = $sm->get('resultSetPrototype');
                    $resultSetPrototype->setArrayObjectPrototype(new \Operacional\Model\BsCidades()); // Notice what is set here
                    return new TableGateway('bs_cidades', $dbAdapter, null, $resultSetPrototype);
                },
                 'Operacional\Model\BsCompaniesTable' => function($sm) {
                    $tableGateway = $sm->get('CompaniesTableGateway');
                    $table = new \Operacional\Model\BsCompaniesTable($tableGateway);
                    return $table;
                },
                'CompaniesTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = $sm->get('resultSetPrototype');
                    $resultSetPrototype->setArrayObjectPrototype(new \Operacional\Model\BsCompanies()); // Notice what is set here
                    return new TableGateway('bs_companies', $dbAdapter, null, $resultSetPrototype);
                },
                'Operacional\Model\BsResourcesTable' => function ($sm) {
                    $tableGateway = $sm->get('BsResourcesTableGateway');
                    return new \Operacional\Model\BsResourcesTable($tableGateway);
                },
                'BsResourcesTableGateway' => function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = $sm->get('resultSetPrototype');
                    $resultSetPrototype->setArrayObjectPrototype(new \Operacional\Model\BsResources());
                    return new TableGateway('bs_resources', $dbAdapter, NULL, $resultSetPrototype);
                },
                'Operacional\Model\BsElementsTable' => function ($sm) {
                    $tableGateway = $sm->get('BsElementsTableGateway');
                    return new \Operacional\Model\BsElementsTable($tableGateway);
                },
                'BsElementsTableGateway' => function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = $sm->get('resultSetPrototype');
                    $resultSetPrototype->setArrayObjectPrototype(new \Operacional\Model\BsElements());
                    return new TableGateway('bs_elements', $dbAdapter, NULL, $resultSetPrototype);
                },
                'Operacional\Model\BsGruposTable' => function ($sm) {
                    $tableGateway = $sm->get('BsGruposTableGateway');
                    return new \Operacional\Model\BsGruposTable($tableGateway);
                },
                'BsGruposTableGateway' => function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = $sm->get('resultSetPrototype');
                    $resultSetPrototype->setArrayObjectPrototype(new \Operacional\Model\BsGrupos());
                    return new TableGateway('bs_grupos', $dbAdapter, NULL, $resultSetPrototype);
                }
            
            ),
            'invokables' => array(
                'Operacional\Model\BsResources' => 'Operacional\Model\BsResources',
                'Operacional\Model\BsElements' => 'Operacional\Model\BsElements',
                'Operacional\Model\BsCompanies' => 'Operacional\Model\BsCompanies',
                'Operacional\Model\BsCidades' => 'Operacional\Model\BsCidades',
                'Operacional\Model\BsGrupos' => 'Operacional\Model\BsGrupos',
                'resultSetPrototype' => 'Zend\Db\ResultSet\ResultSet',
             )
        );
    }

    
    public function getViewHelperConfig() {
        return array(
            'factories' => array(
                'messages' => function ($helperPluginManager) {
                    $sm = $helperPluginManager->getServiceLocator();
                    $messagesPlugin = $sm->get('ControllerPluginManager')->get('messages');
                    $messages = $messagesPlugin->getMergedMessages();
                    $helper = new \Base\View\Helper\Messages($messages);
                    return $helper;
                }, 'RouteHelper' => function($sm) {
                    return new \Base\View\Helper\RouteHelper($sm->getServiceLocator());
                },
                'ZFListarHelper' => function($sm) {
                      return new \Base\View\Helper\ZFListarHelper();
                },
                'FormHelper' => function ($sm) {
                    return new \Base\View\Helper\FormHelper($sm);
                },
            ),
            'invokables' => array(
                'CacheHelper' => 'Base\View\Helper\CacheHelper',
                'HtmlTag' => 'Base\View\Helper\HtmlElement',
                'ZFListarHelper' => 'Base\View\Helper\ZFListarHelper',
                'viewhelpercaptcha' => 'Base\View\Helper\Form\Custom\Captcha\ViewHelperCaptcha',
            )
        );
    }


}