<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Auth;


use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable as DbTableAuthAdapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

// Add this for SMTP transport
use Zend\ServiceManager\ServiceManager;
use Zend\Mail\Transport\Smtp;
use Zend\Mail\Transport\SmtpOptions;

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
                // For Yable data Gateway
                'Auth\Model\BsUsersTable' => function($sm) {
                    $tableGateway = $sm->get('UsersTableGateway');
                    $table = new \Auth\Model\BsUsersTable($tableGateway);
                    return $table;
                },
                'UsersTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new \Auth\Model\BsUsers()); // Notice what is set here
                    return new TableGateway('bs_users', $dbAdapter, null, $resultSetPrototype);
                },
                'Auth\Form\BsUsersForm' => function ($sm) {
                    return new \Auth\Form\BsUsersForm($sm->get('Zend\Db\Adapter\Adapter'));
                },
               'Auth\Model\BsUsers' => function ($sm) {
                    return new \Auth\Model\BsUsers();
                },
                // Add this for SMTP transport
                'mail.transport' => function (ServiceManager $serviceManager) {
                    $config = $serviceManager->get('Config');
                    $transport = new Smtp();
                    $transport->setOptions(new SmtpOptions($config['mail']['transport']['options']));
                    return $transport;
                },
                'Auth\Model\AuthStorage' => function($sm) {
                    return new \Auth\Model\AuthStorage('zf_tutorial');
                },
                'AuthService' => function($sm) {
                    
                    $staticSalt=$sm->get('config')['static_salt'];
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $dbTableAuthAdapter = new DbTableAuthAdapter($dbAdapter,
                     'bs_users',
                     'email',
                     'password',
                     "MD5('{$staticSalt}') AND state = 0");
                    $authService = new AuthenticationService();
                    $authService->setAdapter($dbTableAuthAdapter);
                    $authService->setStorage($sm->get('Auth\Model\AuthStorage'));
                    return $authService;
                },
            ),
            'invokables' => array(
                'Auth\Form\AuthForm' => 'Auth\Form\AuthForm',
            )
        );
    }

    public function getViewHelperConfig() {
        return array(
            'factories' => array(
            ),
            'invokables' => array(
            )
        );
    }

}
