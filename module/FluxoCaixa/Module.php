<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/calcocam for the canonical source repository
 * @copyright Copyright (c) 2005-2016 SIGA-Smart. (http://www.sigasmart.com.br)
 */

namespace FluxoCaixa;
use Zend\Db\TableGateway\TableGateway;
class Module
{
    
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
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
                 'FluxoCaixa\Model\BsCaixaTable' => function($sm) {
                    $tableGateway = $sm->get('BsCaixaTableGateway');
                    return new \FluxoCaixa\Model\BsCaixaTable($tableGateway);
                },
                'BsCaixaTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = $sm->get('resultSetPrototype');
                    $resultSetPrototype->setArrayObjectPrototype(new \FluxoCaixa\Model\BsCaixa()); // Notice what is set here
                    return new TableGateway('bs_caixa', $dbAdapter, null, $resultSetPrototype);
                },
                   'FluxoCaixa\Model\BsMovimentoTable' => function($sm) {
                    $tableGateway = $sm->get('BsMovimentoTableGateway');
                    return new \FluxoCaixa\Model\BsMovimentoTable($tableGateway);
                },
                'BsMovimentoTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = $sm->get('resultSetPrototype');
                    $resultSetPrototype->setArrayObjectPrototype(new \FluxoCaixa\Model\BsMovimento()); // Notice what is set here
                    return new TableGateway('bs_movimento', $dbAdapter, null, $resultSetPrototype);
                }
               
            ),
            'invokables' => array(
                 'FluxoCaixa\Model\BsCaixa'=>'FluxoCaixa\Model\BsCaixa',
                  'FluxoCaixa\Model\BsMovimento'=>'FluxoCaixa\Model\BsMovimento',
            )
        );
    }
    
}