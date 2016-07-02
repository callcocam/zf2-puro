<?php

namespace Base;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module {
    protected $finishLog;
    public function onBootstrap(MvcEvent $e) {

        $eventManager = $e->getApplication()->getEventManager();
        $serviceManager = $e->getApplication()->getServiceManager();

        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        $eventManager->attach($serviceManager->get('LayoutListener'));
        $eventManager->attach($serviceManager->get('LayoutErrorListener'));
       // $eventManager->attach($serviceManager->get('CaixaListener'));
        $eventManager->attach($serviceManager->get('CompaniesListener'));
        $eventManager->attach($serviceManager->get('LogListener'));

      
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
//                'FormRadio'=>'Base\View\Helper\Form\Custom\Radio\FormRadio'
            )
        );
    }

}
