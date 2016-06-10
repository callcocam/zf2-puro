<?php

namespace Home;

return array(
    'router' => array(
        'routes' => array(
            'inicio' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Home\Controller',
                        'controller' => 'Home',
                        'action' => 'index',
                    ),
                ),
            ),
            'home' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/home',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Home\Controller',
                        'controller' => 'Home',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/:action][/:id]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
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
            'Home\Controller\Home' => 'Home\Controller\HomeController',
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
