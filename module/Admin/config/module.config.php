<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonAdmin for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin;

return array(
    'router' => array(
        'routes' => array(
           'admin' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/admin',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Admin\Controller',
                        'controller'    => 'Admin',
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
            'Admin\Controller\Admin' => 'Admin\Controller\AdminController',
             'Admin\Controller\BsCidades' => 'Admin\Controller\BsCidadesController',
             'Admin\Controller\BsCompanies' => 'Admin\Controller\BsCompaniesController',
             'Admin\Controller\BsResources' => 'Admin\Controller\BsResourcesController',
            
        ),

    ),
    'service_manager' => array(
        'factories' => array(// !!! aliases not alias
            'Admin\Form\BsResourcesForm' => 'Admin\Factory\ResourcesFactory',
              'Admin\Form\BsCompaniesForm' => 'Admin\Factory\CompaniesFactory',
           
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
