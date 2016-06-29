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
               'Operacional\Controller\BsTradutor' => 'Operacional\Controller\BsTradutorController',
            
        ),

    ),
    'service_manager' => array(
        'factories' => array(// !!! aliases not alias
              'Operacional\Form\BsResourcesForm' => 'Operacional\Factory\BsResourcesFormFactory',
              'Operacional\Form\BsCompaniesForm' => 'Operacional\Factory\BsCompaniesFormFactory',
              'Operacional\Form\BsGruposForm' => 'Operacional\Factory\BsGruposFormFactory',
               'Operacional\Form\BsTradutorForm' => 'Operacional\Factory\BsTradutorFormFactory',
               'Operacional\Model\BsGruposTable'=>'Operacional\Factory\BsGruposTableFactory',
               'Operacional\Model\BsCompaniesTable'=>'Operacional\Factory\BsCompaniesTableFactory',
               'Operacional\Model\BsResourcesTable'=>'Operacional\Factory\BsResourcesTableFactory',
               'Operacional\Model\BsElementsTable'=>'Operacional\Factory\BsElementsTableFactory',
               'Operacional\Model\BsCidadesTable'=>'Operacional\Factory\BsCidadesTableFactory',
               'Operacional\Model\BsTradutorTable'=>'Operacional\Factory\BsTradutorTableFactory',
               'BsGruposTableGateway'=>'Operacional\Factory\BsGruposFactory',
               'BsCompaniesTableGateway'=>'Operacional\Factory\BsCompaniesFactory',
               'BsResourcesTableGateway'=>'Operacional\Factory\BsResourcesFactory',
               'BsElementsTableGateway'=>'Operacional\Factory\BsElementsFactory',
               'BsCidadesTableGateway'=>'Operacional\Factory\BsCidadesFactory',
               'BsTradutorTableGateway'=>'Operacional\Factory\BsTradutorFactory',
        ),
        'aliases' => array(// !!! aliases not alias
         
        ),
        'invokables' => array(
                'Operacional\Model\BsResources' => 'Operacional\Model\BsResources',
                'Operacional\Model\BsElements' => 'Operacional\Model\BsElements',
                'Operacional\Model\BsCompanies' => 'Operacional\Model\BsCompanies',
                'Operacional\Model\BsCidades' => 'Operacional\Model\BsCidades',
                'Operacional\Model\BsGrupos' => 'Operacional\Model\BsGrupos',
                 'Operacional\Model\BsTradutor' => 'Operacional\Model\BsTradutor',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
  
);