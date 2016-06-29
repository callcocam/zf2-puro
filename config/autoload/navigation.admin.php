<?php

$return = array(
    array(
        'label' => 'FLUXO/CAIXA',
        'class' => 'treeview',
        'action' => '#',
        'icone' => 'ion ion-ios-pulse-strong',
        'title' => 'Controla o fluxo e movimentação do caixa',
        'pages' => array(array(
                'label' => 'ABERTURA/FECHAMENTO',
                'route' => 'fluxo-caixa/default',
                'controller' => 'bs-caixa',
                'resource' => 'FluxoCaixa\Controller\BsCaixa',
                'action' => 'index',
                'privilege' => 'index',
                'icone' => 'fa fa-angle-double-right',
                'title' => 'ABERTURA E FECHAMENTO DE CAIXA',
                'pages' => array(array(
                        'label' => 'Cadastrar',
                        'route' => 'fluxo-caixa/default',
                        'controller' => 'bs-caixa',
                        'resource' => 'FluxoCaixa\Controller\{BsCaixa}',
                        'action' => 'inserir',
                        'privilege' => 'inserir',
                        'title' => 'Cadastrar Registro',
                    ),
                    array(
                        'label' => 'Editar',
                        'route' => 'fluxo-caixa/default',
                        'controller' => 'bs-caixa',
                        'resource' => 'FluxoCaixa\Controller\{BsCaixa}',
                        'action' => 'editar',
                        'privilege' => 'editar',
                        'title' => 'Editar Registro',
                    )),
            ),
            array(
                'label' => 'MOV. FINANCEIRA',
                'route' => 'fluxo-caixa/default',
                'controller' => 'bs-movimento',
                'resource' => 'FluxoCaixa\Controller\BsMovimento',
                'action' => 'index',
                'privilege' => 'index',
                'icone' => 'fa fa-angle-double-right',
                'title' => 'CONTROLA A MOVIMENTAÇÃO FINANCEIRA ENTRADAS E SAIDAS',
                'pages' => array(array(
                        'label' => 'Cadastrar',
                        'route' => 'fluxo-caixa/default',
                        'controller' => 'bs-movimento',
                        'resource' => 'FluxoCaixa\Controller\{BsMovimento}',
                        'action' => 'inserir',
                        'privilege' => 'inserir',
                        'title' => 'Cadastrar Registro',
                    ),
                    array(
                        'label' => 'Editar',
                        'route' => 'fluxo-caixa/default',
                        'controller' => 'bs-movimento',
                        'resource' => 'FluxoCaixa\Controller\{BsMovimento}',
                        'action' => 'editar',
                        'privilege' => 'editar',
                        'title' => 'Editar Registro',
                    )),
            ),
            array(
                'label' => 'PLANOS/CONTAS',
                'route' => 'fluxo-caixa/default',
                'controller' => 'bs-planos-contas',
                'resource' => 'FluxoCaixa\Controller\BsPlanosContas',
                'action' => 'index',
                'privilege' => 'index',
                'icone' => 'fa fa-angle-double-right',
                'title' => 'Planos de entrada e saida de caixa',
                'pages' => array(array(
                        'label' => 'Cadastrar',
                        'route' => 'fluxo-caixa/default',
                        'controller' => 'bs-planos-contas',
                        'resource' => 'FluxoCaixa\Controller\{BsPlanosContas}',
                        'action' => 'inserir',
                        'privilege' => 'inserir',
                        'title' => 'Cadastrar Registro',
                    ),
                    array(
                        'label' => 'Editar',
                        'route' => 'fluxo-caixa/default',
                        'controller' => 'bs-planos-contas',
                        'resource' => 'FluxoCaixa\Controller\{BsPlanosContas}',
                        'action' => 'editar',
                        'privilege' => 'editar',
                        'title' => 'Editar Registro',
                    )),
            ),
            array(
                'label' => 'TIPOS/CONTAS',
                'route' => 'fluxo-caixa/default',
                'controller' => 'bs-contas',
                'resource' => 'FluxoCaixa\Controller\BsContas',
                'action' => 'index',
                'privilege' => 'index',
                'icone' => 'fa fa-angle-double-right',
                'title' => 'Diz em que tipo de conta foi feito o lançamento ex:conta da empresa ou Conta banco bradesco',
                'pages' => array(array(
                        'label' => 'Cadastrar',
                        'route' => 'fluxo-caixa/default',
                        'controller' => 'bs-contas',
                        'resource' => 'FluxoCaixa\Controller\{BsContas}',
                        'action' => 'inserir',
                        'privilege' => 'inserir',
                        'title' => 'Cadastrar Registro',
                    ),
                    array(
                        'label' => 'Editar',
                        'route' => 'fluxo-caixa/default',
                        'controller' => 'bs-contas',
                        'resource' => 'FluxoCaixa\Controller\{BsContas}',
                        'action' => 'editar',
                        'privilege' => 'editar',
                        'title' => 'Editar Registro',
                    )),
            ),
            array(
                'label' => 'BANCOS',
                'route' => 'fluxo-caixa/default',
                'controller' => 'bs-bancos',
                'resource' => 'FluxoCaixa\Controller\BsBancos',
                'action' => 'index',
                'privilege' => 'index',
                'icone' => 'fa fa-angle-double-right',
                'title' => 'Cadastro preview de bancos',
                'pages' => array(array(
                        'label' => 'Cadastrar',
                        'route' => 'fluxo-caixa/default',
                        'controller' => 'bs-bancos',
                        'resource' => 'FluxoCaixa\Controller\{BsBancos}',
                        'action' => 'inserir',
                        'privilege' => 'inserir',
                        'title' => 'Cadastrar Registro',
                    ),
                    array(
                        'label' => 'Editar',
                        'route' => 'fluxo-caixa/default',
                        'controller' => 'bs-bancos',
                        'resource' => 'FluxoCaixa\Controller\{BsBancos}',
                        'action' => 'editar',
                        'privilege' => 'editar',
                        'title' => 'Editar Registro',
                    )),
            ),)
    ),
);     // Fim navigation default
return $return[0];
