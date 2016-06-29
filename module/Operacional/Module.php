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
                "DateFormat" => function () {
                    
                    //die;
                    return new Services\DateFormat();
                },
                "Cache" => function () {
                    return new \Base\Model\Cache();
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
                'GerarViewHelper' => function ($sm) {
                    return new \Base\View\Helper\GerarViewHelper($sm);
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
