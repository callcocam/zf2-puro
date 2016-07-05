<?php

return array(
    "router" => array(
        "routes" => array(
           "controle-estoque" => array(
                "type"    => "Literal",
                "options" => array(
                    "route"    => "/controle-estoque",
                    "defaults" => array(
                        "__NAMESPACE__" => "ControleEstoque\Controller",
                        "controller"    => "ControleEstoque",
                        "action"        => "index",
                    ),
                ),
                "may_terminate" => true,
                "child_routes" => array(
                    "default" => array(
                        "type"    => "Segment",
                        "options" => array(
                            "route" => "/[:controller[/:action][/:id][/:page]]",
                            "constraints" => array(
                                "controller" => "[a-zA-Z][a-zA-Z0-9_-]*",
                                "action"     => "[a-zA-Z][a-zA-Z0-9_-]*",
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
                'ControleEstoque\Controller\BsFornecedores'=>'ControleEstoque\Controller\BsFornecedoresController',
'ControleEstoque\Controller\BsProdutos'=>'ControleEstoque\Controller\BsProdutosController',
        ),
        "factories" => array(
                
        ),

    ),
    "service_manager" => array(
        "factories" => array(// !!! aliases not alias
         'ControleEstoque\Form\BsFornecedoresForm'=>'ControleEstoque\Factory\BsFornecedoresFormFactory',
'BsFornecedoresTableGateway'=>'ControleEstoque\Factory\BsFornecedoresFactory',
'ControleEstoque\Model\BsFornecedoresTable'=>'ControleEstoque\Factory\BsFornecedoresFactoryTable',
'ControleEstoque\Form\BsProdutosForm'=>'ControleEstoque\Factory\BsProdutosFormFactory',
'BsProdutosTableGateway'=>'ControleEstoque\Factory\BsProdutosFactory',
'ControleEstoque\Model\BsProdutosTable'=>'ControleEstoque\Factory\BsProdutosFactoryTable',   
           
        ),
        "aliases" => array(// !!! aliases not alias
         
        ),
        "invokables" => array(
          'ControleEstoque\Model\BsFornecedores' => 'ControleEstoque\Model\BsFornecedores',
'ControleEstoque\Model\BsProdutos' => 'ControleEstoque\Model\BsProdutos', 
        ),
    ),
    "view_manager" => array(
        "template_path_stack" => array(
            __DIR__ . "/../view",
        ),
    ),
  
);