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
            'Admin\Controller\BsClientes' => 'Admin\Controller\BsClientesController',
            'Admin\Controller\BsFornecedores' => 'Admin\Controller\BsFornecedoresController',
            'Admin\Controller\BsProdutos' => 'Admin\Controller\BsProdutosController',
        ),
        "factories" => array(
        ),
    ),
    "service_manager" => array(
        "factories" => array(// !!! aliases not alias
            'Admin\Form\BsClientesForm' => 'Admin\Factory\BsClientesFormFactory',
            'BsClientesTableGateway' => 'Admin\Factory\BsClientesFactory',
            'Admin\Model\BsClientesTable' => 'Admin\Factory\BsClientesFactoryTable',
            'Admin\Form\BsFornecedoresForm' => 'Admin\Factory\BsFornecedoresFormFactory',
            'BsFornecedoresTableGateway' => 'Admin\Factory\BsFornecedoresFactory',
            'Admin\Model\BsFornecedoresTable' => 'Admin\Factory\BsFornecedoresFactoryTable',
            'Admin\Form\BsProdutosForm' => 'Admin\Factory\BsProdutosFormFactory',
            'BsProdutosTableGateway' => 'Admin\Factory\BsProdutosFactory',
            'Admin\Model\BsProdutosTable' => 'Admin\Factory\BsProdutosFactoryTable',
        ),
        "aliases" => array(// !!! aliases not alias
        ),
        "invokables" => array(
            'Admin\Model\BsClientes' => 'Admin\Model\BsClientes',
            'Admin\Model\BsFornecedores' => 'Admin\Model\BsFornecedores',
            'Admin\Model\BsProdutos' => 'Admin\Model\BsProdutos',
        ),
    ),
    "view_manager" => array(
        "template_path_stack" => array(
            __DIR__ . "/../view",
        ),
    ),
);
