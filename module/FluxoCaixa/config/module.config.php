<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/calcocam for the canonical source repository
 * @copyright Copyright (c) 2005-2016 SIGA-Smart. (http://www.sigasmart.com.br)
 */



namespace FluxoCaixa;

return array(
    'router' => array(
        'routes' => array(
            'fluxo-caixa' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/fluxo-caixa',
                    'defaults' => array(
                        '__NAMESPACE__' => 'FluxoCaixa\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action][/:id][/:page]]',
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
            'FluxoCaixa\Controller\Index' => 'FluxoCaixa\Controller\IndexController',
              'FluxoCaixa\Controller\BsCaixa' => 'FluxoCaixa\Controller\BsCaixaController',
               'FluxoCaixa\Controller\BsMovimento' => 'FluxoCaixa\Controller\BsMovimentoController',

        ),
    ),
    'service_manager' => array(
        'factories' => array(// !!! aliases not alias
            'FluxoCaixa\Form\BsCaixaForm' => 'FluxoCaixa\Factory\BsCaixaFactory',
             'FluxoCaixa\Form\BsMovimentoForm' => 'FluxoCaixa\Factory\BsMovimentoFactory',
                     
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