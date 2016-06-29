<?php

namespace ZenCode\Services;

use Zend\Code\Generator\MethodGenerator;

/**
 * BsImages [TIPO]
 *
 * @copyright (c) year, Claudio Coelho
 */
class GerarFactoryTable extends Options {

    public function __construct($data, \Zend\ServiceManager\ServiceLocatorInterface $sl) {

        $this->sl = $sl;
        extract($data->toArray());
        // Poxfix e o que completa o nome do arquivo ArquivoPosfix (ArquivoForm)
        $this->setPosfix("FactoryTable");
        // E tanto o o nome do arquivo como o nome da class
        $this->setName($arquivo);
        // ex:Form, Entity, Service
        $this->setSubDir("Factory");
        // Montar o caminho base
        $aFind = array('DS', 'dirBase', 'dirEntity');
        $aSub = array(DIRECTORY_SEPARATOR, $alias, 'Factory');
        $dirBase = str_replace($aFind, $aSub, ".DSmoduleDSdirBaseDSsrcDSdirBaseDS");
        // Base dir geralmente e ./module/Modulo/src/Modulo
        $this->setBaseDir($dirBase);
        // Name Space ex:Modulo\Form
        $this->setNameSpace(sprintf("%s\Factory", $alias));
        // Se e uma extenção de outra classe set setExtends
        $this->setImplements(array('FactoryInterface'));
        // set os use
        $this->setUses(array('Zend\ServiceManager\FactoryInterface' => null,
            'Zend\ServiceManager\ServiceLocatorInterface' => null,
            sprintf('%s\Model\%sTable', $alias, $arquivo) => null,
        ));
        $class = new \Zend\Code\Generator\ClassGenerator();
        if ($this->getUses()) {
            foreach ($this->getUses() as $key => $value) {
                $class->addUse($key, $value);
            }
        }
        $this->setBody('// Configurações iniciais do Factory Table');
        // gera os methods podemos erar mais de um repetindo o codigo

        $this->setBody(sprintf('$tableGateway = $serviceLocator->get("%sTableGateway");', $arquivo));
        $this->setBody(sprintf('return new %sTable($tableGateway);', $arquivo));

        // gera os methods podemos erar mais de um repetindo o codigo
        $methodOption = array('name' => "createService",
            'parameter' => array(array('name' => "serviceLocator", 'type' => 'ServiceLocatorInterface', 'value' => false)),
            'shortDescription' => "createService Factory Model",
            'longDescription' => null,
            'datatype' => 'createService',
            'body' => sprintf(implode(PHP_EOL, $this->getBody()), $arquivo));

        $methodConstruct = new Methods($methodOption);
        $this->setMethod($methodConstruct);
        $this->setBody("limpa");

        $class->setName($this->getName())->setImplementedInterfaces($this->getImplements())
                ->setNamespaceName($this->getNameSpace())
                ->setExtendedClass($this->getExtends())
                ->setDocblock($this->getDocblock())
                ->addProperties($this->getProperties())
                ->addConstants($this->getConstants())
                ->addMethods($this->getMethod());
        $this->setGenerateClasse($class);
    }

}
