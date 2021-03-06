<?php

$return = array(
          array(
              'label' => 'FLUXO/CAIXA',
              'class' => 'treeview',
              'action'     => '#',
              'icone'     => 'ion ion-wrench',
              'title'   => 'FLUXO/CAIXA',
              'pages'   => array(                    array(
                          'label'      => 'ABERTURA/FECHAMENTO',
                          'route'      => 'fluxo-caixa/default',
                          'controller' => 'bs-caixa',
                          'resource'   => 'FluxoCaixa\Controller\BsCaixa',
                          'action'     => 'index',
                          'privilege'  => 'index',
                          'icone'      => 'fa fa-angle-double-right',
                          'title'      => 'ABERTURA E FECHAMENTO DE CAIXA',
                          'pages'      => array(                    array(
                        'label' => 'Cadastrar',
                        'route' => 'fluxo-caixa/default',
                        'controller' => 'bs-caixa',
                        'resource' => 'FluxoCaixa\Controller\BsCaixa',
                        'action' => 'inserir',
                        'privilege' => 'inserir',
                        'title' => 'Cadastrar Registro',
                    ),
                    array(
                        'label' => 'Editar',
                        'route' => 'fluxo-caixa/default',
                        'controller' => 'bs-caixa',
                        'resource' => 'FluxoCaixa\Controller\BsCaixa',
                        'action' => 'editar',
                        'privilege' => 'editar',
                        'title' => 'Editar Registro',
                    )),
                    ),
                    array(
                          'label'      => 'MOV. FINANCEIRA',
                          'route'      => 'fluxo-caixa/default',
                          'controller' => 'bs-movimento',
                          'resource'   => 'FluxoCaixa\Controller\BsMovimento',
                          'action'     => 'index',
                          'privilege'  => 'index',
                          'icone'      => 'fa fa-angle-double-right',
                          'title'      => 'CONTROLA A MOVIMENTAÇÃO FINANCEIRA ENTRADAS E SAÍDAS',
                          'pages'      => array(                    array(
                        'label' => 'Cadastrar',
                        'route' => 'fluxo-caixa/default',
                        'controller' => 'bs-movimento',
                        'resource' => 'FluxoCaixa\Controller\BsMovimento',
                        'action' => 'inserir',
                        'privilege' => 'inserir',
                        'title' => 'Cadastrar Registro',
                    ),
                    array(
                        'label' => 'Editar',
                        'route' => 'fluxo-caixa/default',
                        'controller' => 'bs-movimento',
                        'resource' => 'FluxoCaixa\Controller\BsMovimento',
                        'action' => 'editar',
                        'privilege' => 'editar',
                        'title' => 'Editar Registro',
                    )),
                    ),
                    array(
                          'label'      => 'PLANOS/CONTAS',
                          'route'      => 'fluxo-caixa/default',
                          'controller' => 'bs-planos-contas',
                          'resource'   => 'FluxoCaixa\Controller\BsPlanosContas',
                          'action'     => 'index',
                          'privilege'  => 'index',
                          'icone'      => 'fa fa-angle-double-right',
                          'title'      => 'Planos de entrada e saida de caixa',
                          'pages'      => array(                    array(
                        'label' => 'Cadastrar',
                        'route' => 'fluxo-caixa/default',
                        'controller' => 'bs-planos-contas',
                        'resource' => 'FluxoCaixa\Controller\BsPlanosContas',
                        'action' => 'inserir',
                        'privilege' => 'inserir',
                        'title' => 'Cadastrar Registro',
                    ),
                    array(
                        'label' => 'Editar',
                        'route' => 'fluxo-caixa/default',
                        'controller' => 'bs-planos-contas',
                        'resource' => 'FluxoCaixa\Controller\BsPlanosContas',
                        'action' => 'editar',
                        'privilege' => 'editar',
                        'title' => 'Editar Registro',
                    )),
                    ),
                    array(
                          'label'      => 'TIPOS/CONTAS',
                          'route'      => 'fluxo-caixa/default',
                          'controller' => 'bs-contas',
                          'resource'   => 'FluxoCaixa\Controller\BsContas',
                          'action'     => 'index',
                          'privilege'  => 'index',
                          'icone'      => 'fa fa-angle-double-right',
                          'title'      => 'Diz em que tipo de conta foi feito o lanÃ§amento ex:conta da empresa ou Conta banco bradesco',
                          'pages'      => array(                    array(
                        'label' => 'Cadastrar',
                        'route' => 'fluxo-caixa/default',
                        'controller' => 'bs-contas',
                        'resource' => 'FluxoCaixa\Controller\BsContas',
                        'action' => 'inserir',
                        'privilege' => 'inserir',
                        'title' => 'Cadastrar Registro',
                    ),
                    array(
                        'label' => 'Editar',
                        'route' => 'fluxo-caixa/default',
                        'controller' => 'bs-contas',
                        'resource' => 'FluxoCaixa\Controller\BsContas',
                        'action' => 'editar',
                        'privilege' => 'editar',
                        'title' => 'Editar Registro',
                    )),
                    ),
                    array(
                          'label'      => 'BANCOS',
                          'route'      => 'fluxo-caixa/default',
                          'controller' => 'bs-bancos',
                          'resource'   => 'FluxoCaixa\Controller\BsBancos',
                          'action'     => 'index',
                          'privilege'  => 'index',
                          'icone'      => 'fa fa-angle-double-right',
                          'title'      => 'Cadastro preview de bancos',
                          'pages'      => array(                    array(
                        'label' => 'Cadastrar',
                        'route' => 'fluxo-caixa/default',
                        'controller' => 'bs-bancos',
                        'resource' => 'FluxoCaixa\Controller\BsBancos',
                        'action' => 'inserir',
                        'privilege' => 'inserir',
                        'title' => 'Cadastrar Registro',
                    ),
                    array(
                        'label' => 'Editar',
                        'route' => 'fluxo-caixa/default',
                        'controller' => 'bs-bancos',
                        'resource' => 'FluxoCaixa\Controller\BsBancos',
                        'action' => 'editar',
                        'privilege' => 'editar',
                        'title' => 'Editar Registro',
                    )),
                    ),
                    array(
                          'label'      => 'CADASTRAR/RECEITAS',
                          'route'      => 'fluxo-caixa/default',
                          'controller' => 'bs-contas-receber',
                          'resource'   => 'FluxoCaixa\Controller\BsContasReceber',
                          'action'     => 'index',
                          'privilege'  => 'index',
                          'icone'      => 'fa fa-angle-double-right',
                          'title'      => 'CADASTRAR/RECEITAS',
                          'pages'      => array(                    array(
                        'label' => 'Cadastrar',
                        'route' => 'fluxo-caixa/default',
                        'controller' => 'bs-contas-receber',
                        'resource' => 'FluxoCaixa\Controller\BsContasReceber',
                        'action' => 'inserir',
                        'privilege' => 'inserir',
                        'title' => 'Cadastrar Registro',
                    ),
                    array(
                        'label' => 'Editar',
                        'route' => 'fluxo-caixa/default',
                        'controller' => 'bs-contas-receber',
                        'resource' => 'FluxoCaixa\Controller\BsContasReceber',
                        'action' => 'editar',
                        'privilege' => 'editar',
                        'title' => 'Editar Registro',
                    )),
                    ),
                    array(
                          'label'      => 'CADASTRO/DESPESAS',
                          'route'      => 'fluxo-caixa/default',
                          'controller' => 'bs-contas-pagar',
                          'resource'   => 'FluxoCaixa\Controller\BsContasPagar',
                          'action'     => 'index',
                          'privilege'  => 'index',
                          'icone'      => 'fa fa-angle-double-right',
                          'title'      => 'CADASTRO/DESPESAS',
                          'pages'      => array(                    array(
                        'label' => 'Cadastrar',
                        'route' => 'fluxo-caixa/default',
                        'controller' => 'bs-contas-pagar',
                        'resource' => 'FluxoCaixa\Controller\BsContasPagar',
                        'action' => 'inserir',
                        'privilege' => 'inserir',
                        'title' => 'Cadastrar Registro',
                    ),
                    array(
                        'label' => 'Editar',
                        'route' => 'fluxo-caixa/default',
                        'controller' => 'bs-contas-pagar',
                        'resource' => 'FluxoCaixa\Controller\BsContasPagar',
                        'action' => 'editar',
                        'privilege' => 'editar',
                        'title' => 'Editar Registro',
                    )),
                    ),
                    array(
                          'label'      => 'CENTRO/CUSTO/LUCRO',
                          'route'      => 'fluxo-caixa/default',
                          'controller' => 'bs-centro-custo',
                          'resource'   => 'FluxoCaixa\Controller\BsCentroCusto',
                          'action'     => 'index',
                          'privilege'  => 'index',
                          'icone'      => 'fa fa-angle-double-right',
                          'title'      => 'Relaciona a despesa o receita a um determinado projeto',
                          'pages'      => array(                    array(
                        'label' => 'Cadastrar',
                        'route' => 'fluxo-caixa/default',
                        'controller' => 'bs-centro-custo',
                        'resource' => 'FluxoCaixa\Controller\BsCentroCusto',
                        'action' => 'inserir',
                        'privilege' => 'inserir',
                        'title' => 'Cadastrar Registro',
                    ),
                    array(
                        'label' => 'Editar',
                        'route' => 'fluxo-caixa/default',
                        'controller' => 'bs-centro-custo',
                        'resource' => 'FluxoCaixa\Controller\BsCentroCusto',
                        'action' => 'editar',
                        'privilege' => 'editar',
                        'title' => 'Editar Registro',
                    )),
                    ),
                    array(
                          'label'      => 'TIPO\DOCUMENTO',
                          'route'      => 'fluxo-caixa/default',
                          'controller' => 'bs-tipo-documento',
                          'resource'   => 'FluxoCaixa\Controller\BsTipoDocumento',
                          'action'     => 'index',
                          'privilege'  => 'index',
                          'icone'      => 'fa fa-angle-double-right',
                          'title'      => 'TIPO\DOCUMENTO',
                          'pages'      => array(                    array(
                        'label' => 'Cadastrar',
                        'route' => 'fluxo-caixa/default',
                        'controller' => 'bs-tipo-documento',
                        'resource' => 'FluxoCaixa\Controller\BsTipoDocumento',
                        'action' => 'inserir',
                        'privilege' => 'inserir',
                        'title' => 'Cadastrar Registro',
                    ),
                    array(
                        'label' => 'Editar',
                        'route' => 'fluxo-caixa/default',
                        'controller' => 'bs-tipo-documento',
                        'resource' => 'FluxoCaixa\Controller\BsTipoDocumento',
                        'action' => 'editar',
                        'privilege' => 'editar',
                        'title' => 'Editar Registro',
                    )),
                    ),)
          ),
          array(
              'label' => 'GESTÃO/COMERCIAL',
              'class' => 'treeview',
              'action'     => '#',
              'icone'     => 'ion ion-wrench',
              'title'   => 'OPERACIONAL',
              'pages'   => array(                    array(
                          'label'      => 'CLIENTES',
                          'route'      => 'admin/default',
                          'controller' => 'bs-clientes',
                          'resource'   => 'Admin\Controller\BsClientes',
                          'action'     => 'index',
                          'privilege'  => 'index',
                          'icone'      => 'fa fa-angle-double-right',
                          'title'      => 'CLIENTES',
                          'pages'      => array(                    array(
                        'label' => 'Cadastrar',
                        'route' => 'admin/default',
                        'controller' => 'bs-clientes',
                        'resource' => 'Admin\Controller\BsClientes',
                        'action' => 'inserir',
                        'privilege' => 'inserir',
                        'title' => 'Cadastrar Registro',
                    ),
                    array(
                        'label' => 'Editar',
                        'route' => 'admin/default',
                        'controller' => 'bs-clientes',
                        'resource' => 'Admin\Controller\BsClientes',
                        'action' => 'editar',
                        'privilege' => 'editar',
                        'title' => 'Editar Registro',
                    )),
                    ),
                    array(
                          'label'      => 'FORNECEDORES',
                          'route'      => 'admin/default',
                          'controller' => 'bs-fornecedores',
                          'resource'   => 'Admin\Controller\BsFornecedores',
                          'action'     => 'index',
                          'privilege'  => 'index',
                          'icone'      => 'fa fa-angle-double-right',
                          'title'      => 'FORNECEDORES',
                          'pages'      => array(                    array(
                        'label' => 'Cadastrar',
                        'route' => 'admin/default',
                        'controller' => 'bs-fornecedores',
                        'resource' => 'Admin\Controller\BsFornecedores',
                        'action' => 'inserir',
                        'privilege' => 'inserir',
                        'title' => 'Cadastrar Registro',
                    ),
                    array(
                        'label' => 'Editar',
                        'route' => 'admin/default',
                        'controller' => 'bs-fornecedores',
                        'resource' => 'Admin\Controller\BsFornecedores',
                        'action' => 'editar',
                        'privilege' => 'editar',
                        'title' => 'Editar Registro',
                    )),
                    ),)
          ),
          array(
              'label' => 'CONTROLE/ESTOQUE',
              'class' => 'treeview',
              'action'     => '#',
              'icone'     => 'ion ion-wrench',
              'title'   => 'CONTROLE/ESTOQUE',
              'pages'   => array(                    array(
                          'label'      => 'PRODUTOS',
                          'route'      => 'admin/default',
                          'controller' => 'bs-produtos',
                          'resource'   => 'Admin\Controller\BsProdutos',
                          'action'     => 'index',
                          'privilege'  => 'index',
                          'icone'      => 'fa fa-angle-double-right',
                          'title'      => 'Produtos',
                          'pages'      => array(                    array(
                        'label' => 'Cadastrar',
                        'route' => 'admin/default',
                        'controller' => 'bs-produtos',
                        'resource' => 'Admin\Controller\BsProdutos',
                        'action' => 'inserir',
                        'privilege' => 'inserir',
                        'title' => 'Cadastrar Registro',
                    ),
                    array(
                        'label' => 'Editar',
                        'route' => 'admin/default',
                        'controller' => 'bs-produtos',
                        'resource' => 'Admin\Controller\BsProdutos',
                        'action' => 'editar',
                        'privilege' => 'editar',
                        'title' => 'Editar Registro',
                    )),
                    ),)
          ),
 );     // Fim navigation default
return $return[0];