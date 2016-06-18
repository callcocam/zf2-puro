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
                },
                'Upload\Model\BsImagesTable'=>function($sm){
                    $tableGateway=$sm->get('BsImagesTableGateway');
                    return new Model\BsImagesTable($tableGateway);
                },
                'BsImagesTableGateway'=>  function ($sm)
                {
                    $dbAdapter=$sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype=$sm->get('resultSetPrototype');
                    $resultSetPrototype->setArrayObjectPrototype(new Model\BsImages());
                    return new \Zend\Db\TableGateway\TableGateway('bs_images', $dbAdapter, NULL, $resultSetPrototype);
                }
                ),
            'invokables' => array(
                'Upload\Form\BsUploadForm'=>'Upload\Form\BsUploadForm',
                'Upload\Model\BsImages'=>'Upload\Model\BsImages',
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
