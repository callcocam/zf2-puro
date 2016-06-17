<?php

namespace Upload;

/**
 * module.config [module.config]
 *
 * @copyright (c) year, Claudio Coelho
 */
return array(
    'router' => array(
        'routes' => array(
            'upload' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/upload',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Upload\Controller',
                        'controller' => 'Upload',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/:action][/:id][/:page]]',
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
        'factories' => array(
            'Upload\Controller\Upload' => 'Upload\Factory\FilesFactory'
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'files' => [
        'base_path' => 'files',
        'max_size' => '1536MB'
    ]
);
