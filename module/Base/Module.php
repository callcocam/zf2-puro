<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Base;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Db\TableGateway\TableGateway;

class Module {

    public function onBootstrap(MvcEvent $e) {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        $sharedManager = $eventManager->getSharedManager();
        $sharedManager->attach('Zend\Mvc\Controller\AbstractActionController', 'dispatch', function($ev) {
            $cache = new Model\Cache(array('ttl'=>6000));
            if (!$cache->hasItem("companies")) {
                $model = $ev->getApplication()->getServiceManager()->get('Admin\Model\BsCompaniesTable');
                $companies = $model->findOneBy(array('state' => 0));
                if ($companies) {
                    $cache->addItem("companies", $companies->toArray());
                }
            }
        }, 99);
    }

    public function companies() {

        die;
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
    
    public function getViewHelperConfig()
    {
         return array(
            'factories' => array(
                
            ),
            'invokables' => array(
                'CacheHelper' => 'Base\View\Helper\CacheHelper',
            )
        );
    }

}
