<?php

return array(
    "router" => array(
        "routes" => array(
           "gestao" => array(
                "type"    => "Literal",
                "options" => array(
                    "route"    => "/gestao",
                    "defaults" => array(
                        "__NAMESPACE__" => "Gestao\Controller",
                        "controller"    => "Gestao",
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
                'Gestao\Controller\BsClientes'=>'Gestao\Controller\BsClientesController',
        ),
        "factories" => array(
                
        ),

    ),
    "service_manager" => array(
        "factories" => array(// !!! aliases not alias
         'Gestao\Form\BsClientesForm'=>'Gestao\Factory\BsClientesFormFactory',
'BsClientesTableGateway'=>'Gestao\Factory\BsClientesFactory',
'Gestao\Model\BsClientesTable'=>'Gestao\Factory\BsClientesFactoryTable',   
           
        ),
        "aliases" => array(// !!! aliases not alias
         
        ),
        "invokables" => array(
          'Gestao\Model\BsClientes' => 'Gestao\Model\BsClientes', 
        ),
    ),
    "view_manager" => array(
        "template_path_stack" => array(
            __DIR__ . "/../view",
        ),
    ),
  
);