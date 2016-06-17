<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonAdmin for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Ddl;

return array(
    'router' => array(
        'routes' => array(
           'ddl' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/ddl',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Ddl\Controller',
                        'controller'    => 'Ddl',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                           'route' => '/[:controller[/:action][/:id][/:page]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
     'controllers' => array(
        'invokables' => array(
            'Ddl\Controller\Ddl' => 'Ddl\Controller\DdlController',
          ),

    ),
    'service_manager' => array(
        'factories' => array(// !!! aliases not alias
            'Ddl\Form\DdlForm' => 'Ddl\Factory\DdlFactory',
           
        ),
        'aliases' => array(// !!! aliases not alias
         
        ),
        'invokables' => array(
           
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
