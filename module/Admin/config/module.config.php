<?php

return array(
    "router" => array(
        "routes" => array(
            "admin" => array(
                "type" => "Literal",
                "options" => array(
                    "route" => "/admin",
                    "defaults" => array(
                        "__NAMESPACE__" => "Admin\Controller",
                        "controller" => "Admin",
                        "action" => "index",
                    ),
                ),
                "may_terminate" => true,
                "child_routes" => array(
                    "default" => array(
                        "type" => "Segment",
                        "options" => array(
                            "route" => "/[:controller[/:action][/:id][/:page]]",
                            "constraints" => array(
                                "controller" => "[a-zA-Z][a-zA-Z0-9_-]*",
                                "action" => "[a-zA-Z][a-zA-Z0-9_-]*",
                            ),
                            "defaults" => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    "controllers" => array(
        "invokables" => array(
            'Admin\Controller\Admin' => 'Admin\Controller\AdminController',
            'Admin\Controller\BsUsers' => 'Admin\Controller\BsUsersController'
        ),
        "factories" => array(
        ),
    ),
    "service_manager" => array(
        "factories" => array(// !!! aliases not alias
            'Admin\Form\BsUsersForm' => 'Admin\Factory\BsUsersFormFactory',
            'BsUsersTableGateway' => 'Admin\Factory\BsUsersFactory',
            'Admin\Model\BsUsersTable' => 'Admin\Factory\BsUsersFactoryTable',
        ),
        "aliases" => array(// !!! aliases not alias
        ),
        "invokables" => array(
            'Admin\Model\BsUsers' => 'Admin\Model\BsUsers',
        ),
    ),
    "view_manager" => array(
        "template_path_stack" => array(
            __DIR__ . "/../view",
        ),
    ),
);
