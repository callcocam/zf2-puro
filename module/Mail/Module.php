<?php

/**
 * Module
 */

namespace Mail;

use Zend\Mail\Transport\SmtpOptions,
    Zend\Mail\Transport\Smtp,
    Mail\Options\MailOptions;

class Module {

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * Return an array for passing to Zend\Loader\AutoloaderFactory.
     *
     * @return array
     */
    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                      __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                )
            )
        );
    }

    public function getServiceConfig() {
        return array(
            'factories' => array(
                'mail-transport' => function($sm) {
                    $config = $sm->get('config');
                    if (isset($config['Mail']['transport']['smtpOptions'])) {
                        $valuesOptions = $config['Mail']['transport']['smtpOptions'];
                        $transportSslOptions = $config['Mail']['transport']['transportSsl'];
                        if ($transportSslOptions['use_ssl'])
                            $valuesOptions['connection_config']['ssl'] = $transportSslOptions['connection_type'];
                        $smtpOptions = new SmtpOptions($valuesOptions);
                        $transport = new Smtp($smtpOptions);
                        return $transport;
                    } else {
                        throw new \Exception('Você precisa configurar o STMP Options no module.config.php');
                    }
                },
                'mail-template' => function($sm) {
                    return new \Mail\Service\Template($sm);
                },
                'mail-options' => function($sm) {
                    $config = $sm->get('config');
                    if (isset($config['Mail']['options'])) {
                        $valueOptions = $config['Mail']['options'];
                        return new MailOptions($valueOptions);
                    } else {
                        throw new Exception('Erro ao carregar o arquivo de configuração com as opções');
                    }
                },
                'Mail\Service\Mail' => function($sm) {
                    $transport = $sm->get('mail-transport');
                    $template = $sm->get('mail-template');
                    $options = $sm->get('mail-options');
                    return new \Mail\Service\Mail($transport, $options, $template);
                }
            ),
            'invokables' => array(
            )
        );
    }

}
