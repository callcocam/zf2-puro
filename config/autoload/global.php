<?php
return array(
    'db' => array(
        'driver' => 'Pdo',
        'dsn' => 'mysql:dbname=base;host=localhost',
        'driver_options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Zend\Db\Adapter\Adapter'
            => 'Zend\Db\Adapter\AdapterServiceFactory',
        ),
    ),
    'static_salt' => 'aFGQ475SDsdfsaf2342',
    'Log' => array(
        'notificationMail' => array(
            'notify' => FALSE,
            'priorities' => array(
                '0' => 'Emergency',
                '2' => 'Critical',
                '3' => 'Error',
                '4' => 'Warning',
                '5' => 'Debug'
            ),
            'email' => 'callcocam@gmail.com'
        )
    ),
);
