<?php

namespace Home;

/**
 * Class [TIPO]
 */

/**
 * Description of Module
 *
 * @author Claudio
 * @copyright (c) year, Claudio Campos
 */
class Module {

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
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
