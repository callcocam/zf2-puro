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
                'type' => 'Segment',
                'options' => array(
                    'route' => '/home[/][:action][/:url][/:page]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Home\Controller\Home',
                        'action' => 'index',
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
