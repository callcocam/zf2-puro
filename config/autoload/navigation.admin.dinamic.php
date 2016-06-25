<?php 
 return  array(
        'label' => 'FLUXO DE CAIXA',
        'class' => 'treeview',
        'action' => '#',
        'icone' => 'ion ion-ios-pulse-strong',
        'title' => 'Grupo de suporte do sistema',
        'pages' => array(
                array(
                    'label' => 'Fluxo/Caixa',
                    'route' => 'fluxo-caixa/default',
                    'controller' => 'bs-caixa',
                    'resource' => 'FluxoCaixa\Controller\BsCaixa',
                    'action' => 'index',
                    'privilege' => 'index',
                    'icone' => 'ion ion-social-usd',
                    'title' => '',
                ),
                  array(
                    'label' => 'Movimento/Caixa',
                    'route' => 'fluxo-caixa/default',
                    'controller' => 'bs-movimento',
                    'resource' => 'FluxoCaixa\Controller\BsMovimento',
                    'action' => 'index',
                    'privilege' => 'index',
                    'icone' => 'ion ion-social-usd',
                    'title' => '',
                ),
            ),
         );