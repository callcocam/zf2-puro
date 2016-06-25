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
                $model = $ev->getApplication()->getServiceManager()->get('Operacional\Model\BsCompaniesTable');
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
               
               
            ),
            'invokables' => array(
                 
            )
        );
    }

    public function getViewHelperConfig() {
        return array(
            
        
            'invokables' => array(
                
            )
        );
    }

}
