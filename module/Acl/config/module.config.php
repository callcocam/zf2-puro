<?php

namespace Acl;

return array(
    'router' => array(
        'routes' => array(
            'acl' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/acl',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Acl\Controller',
                        'controller' => 'Acl',
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
            'Acl\Controller\Acl' => 'Acl\Controller\AclController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'service_manager' => array(
        'factories' => array(// !!! aliases not alias
            'Acl\Form\BsPrivilegesForm' => 'Acl\Factory\BsPrivilegesFactory'
        ),
        'aliases' => array(// !!! aliases not alias
        ),
        'invokables' => array(
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
