<?php

//return array(
//    'Mail' => array(
//        'transport' => array(
//            'smtpOptions' => array(
//                'host' => 'smtp.callcocam.com.br',
//                'port' => 587,
//                'connection_class' => 'login',
//                'connection_config' => array(
//                    'username' => 'contato@callcocam.com.br',
//                    'password' => 'vmiq2552',
//                    'from' => 'contato@callcocam.com.br'
//                ),
//            ),
//            'transportSsl' => array(
//                'use_ssl' => false,
//                'connection_type' => 'tls' // ssl, tls
//            ),
//        ),
//        'options' => array(
//            'type' => 'text/html',
//            'html_encoding' => \Zend\Mime\Mime::ENCODING_8BIT,
//            'message_encoding' => 'UTF8'
//        )
//    ),
//     'service_manager' => array(
//        'factories' => array(
//             'mail'  => 'Mail\Service\Mail',
//        )
//    )
//);


return array(
    'Mail' => array(
        'transport' => array(
            'smtpOptions' => array(
                'host' => 'rlin70.hpwoc.com',
                'port' => 587,
                'connection_class' => 'login',
                'connection_config' => array(
                    'username' => 'suporte@agenciajm.com.br',
                    'password' => 'vmiq2552',
                    'from' => 'contato@callcocam.com.br'
                ),
            ),
            'transportSsl' => array(
                'use_ssl' => false,
                'connection_type' => 'tls' // ssl, tls
            ),
        ),
        'options' => array(
            'type' => 'text/html',
            'html_encoding' => \Zend\Mime\Mime::ENCODING_8BIT,
            'message_encoding' => 'UTF8'
        )
    ),
     'service_manager' => array(
        'factories' => array(
             'mail'  => 'Mail\Service\Mail',
        )
    )
);