<?php
namespace Base\Factory;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
/**
 * BsImages [TIPO]
 *
 * @copyright (c) year, Claudio Coelho
 */
class AbstractFactory implements FactoryInterface {

    protected $model;
    protected $table;
    protected $tabela;

    public function createService(ServiceLocatorInterface $serviceLocator) {
        $dbAdapter = $serviceLocator->get('Zend\Db\Adapter\Adapter');
        $resultSetPrototype = $serviceLocator->get('resultSetPrototype');
        $resultSetPrototype->setArrayObjectPrototype($serviceLocator->get($this->model)); // Notice what is set here
        return new \Zend\Db\TableGateway\TableGateway($this->tabela, $dbAdapter, null, $resultSetPrototype);
    }

//put your code here
}
