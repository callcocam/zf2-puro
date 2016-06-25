<?php

$return = array(
          array(
              'label' => 'FLUXO/CAIXA',
              'class' => 'treeview',
              'action'     => '#',
              'icone'     => 'ion ion-ios-pulse-strong',
              'title'   => 'Controla o fluxo e movimentação do caixa',
              'pages'   => array(                    array(
                          'label'      => 'ABERTURA/FECHAMENTO',
                          'route'      => 'fluxo-caixa/default',
                          'controller' => 'bs-caixa',
                          'resource'   => 'FluxoCaixa\Controller\BsCaixa',
                          'action'     => 'index',
                          'privilege'  => 'index',
                          'icone'      => 'fa fa-angle-double-right',
                          'title'      => 'ABERTURA E FECHAMENTO DE CAIXA',
                    ),
                    array(
                          'label'      => 'MOV. FINANCEIRA',
                          'route'      => 'fluxo-caixa/default',
                          'controller' => 'bs-movimento',
                          'resource'   => 'FluxoCaixa\Controller\BsMovimento',
                          'action'     => 'index',
                          'privilege'  => 'index',
                          'icone'      => 'fa fa-angle-double-right',
                          'title'      => 'CONTROLA A MOVIMENTAÇÃO FINANCEIRA ENTRADAS E SAIDAS',
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
                    ),)
          ),
 );     // Fim navigation default
return $return[0];