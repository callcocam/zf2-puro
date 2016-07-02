<?php
namespace Gestao;

class Module
{
    public function getConfig() {
       if(file_exists(__DIR__ . '/config/module.config.php')):
             return include __DIR__ . '/config/module.config.php';
        endif;
        return [];
    }

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}