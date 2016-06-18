<?php

namespace Upload;

/**
 * Module [Module]
 *
 * @copyright (c) year, Claudio Coelho
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

    public function getServiceConfig() {
        return array(
            'factories' => array(
                'Upload\Files\FilesOptions' => function ($sm) {
                   return new \Upload\Files\FilesOptions($sm);
                },
                    'Upload\Files\FilesService' => function ($sm) {
                    $options = $sm->get('Upload\Files\FilesOptions');
                    
                    return new \Upload\Files\FilesService($options);
                }
                    ),
                    'invokables' => array(
                    )
                );
            }

            public function getViewHelperConfig() {
                return array(
                    'factories' => array(
                    ),
                    'invokables' => array(
                    )
                );
            }

        }
        