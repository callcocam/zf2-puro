<?php

return array(
    "router" => array(
        "routes" => array(
           "fluxo-caixa" => array(
                "type"    => "Literal",
                "options" => array(
                    "route"    => "/fluxo-caixa",
                    "defaults" => array(
                        "__NAMESPACE__" => "FluxoCaixa\Controller",
                        "controller"    => "FluxoCaixa",
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
                'FluxoCaixa\Controller\BsCaixa'=>'FluxoCaixa\Controller\BsCaixaController',
'FluxoCaixa\Controller\BsMovimento'=>'FluxoCaixa\Controller\BsMovimentoController',
'FluxoCaixa\Controller\BsPlanosContas'=>'FluxoCaixa\Controller\BsPlanosContasController',
'FluxoCaixa\Controller\BsContas'=>'FluxoCaixa\Controller\BsContasController',
'FluxoCaixa\Controller\BsBancos'=>'FluxoCaixa\Controller\BsBancosController',
'FluxoCaixa\Controller\BsContasReceber'=>'FluxoCaixa\Controller\BsContasReceberController',
'FluxoCaixa\Controller\BsContasPagar'=>'FluxoCaixa\Controller\BsContasPagarController',
'FluxoCaixa\Controller\BsCentroCusto'=>'FluxoCaixa\Controller\BsCentroCustoController',
'FluxoCaixa\Controller\BsTipoDocumento'=>'FluxoCaixa\Controller\BsTipoDocumentoController',
'FluxoCaixa\Controller\BsApropriacaoCusto'=>'FluxoCaixa\Controller\BsApropriacaoCustoController',
'FluxoCaixa\Controller\BsTipoCusto'=>'FluxoCaixa\Controller\BsTipoCustoController',
'FluxoCaixa\Controller\BsContaRepete'=>'FluxoCaixa\Controller\BsContaRepeteController',
'FluxoCaixa\Controller\BsContaSituacao'=>'FluxoCaixa\Controller\BsContaSituacaoController',
'FluxoCaixa\Controller\BsContaPeriodos'=>'FluxoCaixa\Controller\BsContaPeriodosController',
        ),
        "factories" => array(
                
        ),

    ),
    "service_manager" => array(
        "factories" => array(// !!! aliases not alias
         'FluxoCaixa\Form\BsCaixaForm'=>'FluxoCaixa\Factory\BsCaixaFormFactory',
'BsCaixaTableGateway'=>'FluxoCaixa\Factory\BsCaixaFactory',
'FluxoCaixa\Model\BsCaixaTable'=>'FluxoCaixa\Factory\BsCaixaFactoryTable',
'FluxoCaixa\Form\BsMovimentoForm'=>'FluxoCaixa\Factory\BsMovimentoFormFactory',
'BsMovimentoTableGateway'=>'FluxoCaixa\Factory\BsMovimentoFactory',
'FluxoCaixa\Model\BsMovimentoTable'=>'FluxoCaixa\Factory\BsMovimentoFactoryTable',
'FluxoCaixa\Form\BsPlanosContasForm'=>'FluxoCaixa\Factory\BsPlanosContasFormFactory',
'BsPlanosContasTableGateway'=>'FluxoCaixa\Factory\BsPlanosContasFactory',
'FluxoCaixa\Model\BsPlanosContasTable'=>'FluxoCaixa\Factory\BsPlanosContasFactoryTable',
'FluxoCaixa\Form\BsContasForm'=>'FluxoCaixa\Factory\BsContasFormFactory',
'BsContasTableGateway'=>'FluxoCaixa\Factory\BsContasFactory',
'FluxoCaixa\Model\BsContasTable'=>'FluxoCaixa\Factory\BsContasFactoryTable',
'FluxoCaixa\Form\BsBancosForm'=>'FluxoCaixa\Factory\BsBancosFormFactory',
'BsBancosTableGateway'=>'FluxoCaixa\Factory\BsBancosFactory',
'FluxoCaixa\Model\BsBancosTable'=>'FluxoCaixa\Factory\BsBancosFactoryTable',
'FluxoCaixa\Form\BsContasReceberForm'=>'FluxoCaixa\Factory\BsContasReceberFormFactory',
'BsContasReceberTableGateway'=>'FluxoCaixa\Factory\BsContasReceberFactory',
'FluxoCaixa\Model\BsContasReceberTable'=>'FluxoCaixa\Factory\BsContasReceberFactoryTable',
'FluxoCaixa\Form\BsContasPagarForm'=>'FluxoCaixa\Factory\BsContasPagarFormFactory',
'BsContasPagarTableGateway'=>'FluxoCaixa\Factory\BsContasPagarFactory',
'FluxoCaixa\Model\BsContasPagarTable'=>'FluxoCaixa\Factory\BsContasPagarFactoryTable',
'FluxoCaixa\Form\BsCentroCustoForm'=>'FluxoCaixa\Factory\BsCentroCustoFormFactory',
'BsCentroCustoTableGateway'=>'FluxoCaixa\Factory\BsCentroCustoFactory',
'FluxoCaixa\Model\BsCentroCustoTable'=>'FluxoCaixa\Factory\BsCentroCustoFactoryTable',
'FluxoCaixa\Form\BsTipoDocumentoForm'=>'FluxoCaixa\Factory\BsTipoDocumentoFormFactory',
'BsTipoDocumentoTableGateway'=>'FluxoCaixa\Factory\BsTipoDocumentoFactory',
'FluxoCaixa\Model\BsTipoDocumentoTable'=>'FluxoCaixa\Factory\BsTipoDocumentoFactoryTable',
'FluxoCaixa\Form\BsApropriacaoCustoForm'=>'FluxoCaixa\Factory\BsApropriacaoCustoFormFactory',
'BsApropriacaoCustoTableGateway'=>'FluxoCaixa\Factory\BsApropriacaoCustoFactory',
'FluxoCaixa\Model\BsApropriacaoCustoTable'=>'FluxoCaixa\Factory\BsApropriacaoCustoFactoryTable',
'FluxoCaixa\Form\BsTipoCustoForm'=>'FluxoCaixa\Factory\BsTipoCustoFormFactory',
'BsTipoCustoTableGateway'=>'FluxoCaixa\Factory\BsTipoCustoFactory',
'FluxoCaixa\Model\BsTipoCustoTable'=>'FluxoCaixa\Factory\BsTipoCustoFactoryTable',
'FluxoCaixa\Form\BsContaRepeteForm'=>'FluxoCaixa\Factory\BsContaRepeteFormFactory',
'BsContaRepeteTableGateway'=>'FluxoCaixa\Factory\BsContaRepeteFactory',
'FluxoCaixa\Model\BsContaRepeteTable'=>'FluxoCaixa\Factory\BsContaRepeteFactoryTable',
'FluxoCaixa\Form\BsContaSituacaoForm'=>'FluxoCaixa\Factory\BsContaSituacaoFormFactory',
'BsContaSituacaoTableGateway'=>'FluxoCaixa\Factory\BsContaSituacaoFactory',
'FluxoCaixa\Model\BsContaSituacaoTable'=>'FluxoCaixa\Factory\BsContaSituacaoFactoryTable',
'FluxoCaixa\Form\BsContaPeriodosForm'=>'FluxoCaixa\Factory\BsContaPeriodosFormFactory',
'BsContaPeriodosTableGateway'=>'FluxoCaixa\Factory\BsContaPeriodosFactory',
'FluxoCaixa\Model\BsContaPeriodosTable'=>'FluxoCaixa\Factory\BsContaPeriodosFactoryTable',   
           
        ),
        "aliases" => array(// !!! aliases not alias
         
        ),
        "invokables" => array(
          'FluxoCaixa\Model\BsCaixa' => 'FluxoCaixa\Model\BsCaixa',
'FluxoCaixa\Model\BsMovimento' => 'FluxoCaixa\Model\BsMovimento',
'FluxoCaixa\Model\BsPlanosContas' => 'FluxoCaixa\Model\BsPlanosContas',
'FluxoCaixa\Model\BsContas' => 'FluxoCaixa\Model\BsContas',
'FluxoCaixa\Model\BsBancos' => 'FluxoCaixa\Model\BsBancos',
'FluxoCaixa\Model\BsContasReceber' => 'FluxoCaixa\Model\BsContasReceber',
'FluxoCaixa\Model\BsContasPagar' => 'FluxoCaixa\Model\BsContasPagar',
'FluxoCaixa\Model\BsCentroCusto' => 'FluxoCaixa\Model\BsCentroCusto',
'FluxoCaixa\Model\BsTipoDocumento' => 'FluxoCaixa\Model\BsTipoDocumento',
'FluxoCaixa\Model\BsApropriacaoCusto' => 'FluxoCaixa\Model\BsApropriacaoCusto',
'FluxoCaixa\Model\BsTipoCusto' => 'FluxoCaixa\Model\BsTipoCusto',
'FluxoCaixa\Model\BsContaRepete' => 'FluxoCaixa\Model\BsContaRepete',
'FluxoCaixa\Model\BsContaSituacao' => 'FluxoCaixa\Model\BsContaSituacao',
'FluxoCaixa\Model\BsContaPeriodos' => 'FluxoCaixa\Model\BsContaPeriodos', 
        ),
    ),
    "view_manager" => array(
        "template_path_stack" => array(
            __DIR__ . "/../view",
        ),
    ),
  
);