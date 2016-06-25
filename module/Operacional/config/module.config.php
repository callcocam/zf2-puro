<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonAdmin for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Operacional;
return array(
    'router' => array(
        'routes' => array(
           'operacional' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/operacional',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Operacional\Controller',
                        'controller'    => 'Operacional',
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
              'Operacional\Controller\BsCompanies' => 'Operacional\Controller\BsCompaniesController',
             'Operacional\Controller\BsResources' => 'Operacional\Controller\BsResourcesController',
              'Operacional\Controller\BsGrupos' => 'Operacional\Controller\BsGruposController',
            
        ),

    ),
    'service_manager' => array(
        'factories' => array(// !!! aliases not alias
            'Operacional\Form\BsResourcesForm' => 'Operacional\Factory\ResourcesFactory',
              'Operacional\Form\BsCompaniesForm' => 'Operacional\Factory\CompaniesFactory',
              'Operacional\Form\BsGruposForm' => 'Operacional\Factory\GruposFactory',
           
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
  
);