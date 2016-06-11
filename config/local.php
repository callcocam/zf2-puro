<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

return array(
    'db' => array(
        'username' => 'sistema_siga',
        'password' => 'vmiq2552'
    ),
    'mail' => array(
        'transport' => array(
            'options' => array(
                'host' => 'smtp.sigasmart.com.br',
                'port' => 587,
                'connection_class' => 'plain',
                'connection_config' => array(
                    'username' => 'suporte@sigasmart.com.br',
                    'password' => 'vmiq2552suporte',
                    'ssl' => 'tls'
                ),
            ),
        ),
    ),
);
