<?php

namespace Base;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Db\TableGateway\TableGateway;

class Module {

    public function onBootstrap(MvcEvent $e) {
       
        $eventManager = $e->getApplication()->getEventManager();
        $serviceManager = $e->getApplication()->getServiceManager();
        
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        
        $sharedManager = $eventManager->getSharedManager();
        $eventManager->attach($serviceManager->get('LayoutListener'));
        $eventManager->attach($serviceManager->get('LayoutErrorListener'));
        $sharedManager->attach('Zend\Mvc\Controller\AbstractActionController', 'dispatch', function($ev) {
            $cache = new Model\Cache();
            if (!$cache->hasItem("companies")) {
                $model = $ev->getApplication()->getServiceManager()->get('Admin\Model\BsCompaniesTable');
                $companies = $model->findOneBy(array('state' => 0));
                if ($companies) {
                    $cache->addItem("companies", $companies->toArray());
                }
            }
        }, 99);
    }


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
                // For Yable data Gateway
                'Admin\Model\BsCompaniesTable' => function($sm) {
                    $tableGateway = $sm->get('CompaniesTableGateway');
                    $table = new \Admin\Model\BsCompaniesTable($tableGateway);
                    return $table;
                },
                'CompaniesTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = $sm->get('resultSetPrototype');
                    $resultSetPrototype->setArrayObjectPrototype(new \Admin\Model\BsCompanies()); // Notice what is set here
                    return new TableGateway('bs_companies', $dbAdapter, null, $resultSetPrototype);
                },
            ),
            'invokables' => array(
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
                    $helper = new View\Helper\Messages($messages);
                    return $helper;
                },
            ),
            'invokables' => array(
                'CacheHelper' => 'Base\View\Helper\CacheHelper',
            )
        );
    }

}
