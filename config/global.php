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

return array(
    'db' => array(
         'driver'         => 'Pdo',
         'dsn'            => 'mysql:dbname=sistema_siga;host=sistema_siga.mysql.dbaas.com.br',
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
    'log' => array(
    'Base\Log' => array(
        'writers' => array(
            array(
                'name'     => 'stream',
                'priority' => 1000,
                'options'  => array(
                    'stream' => './data/logs/app.log',
                ),
            ),
        ),
    ),
),
);
