<?php

namespace ZenCode\Services;

/**
 * BsImages [TIPO]
 *
 * @copyright (c) year, Claudio Coelho
 */
class GerarController extends Options {

    public function __construct($data, \Zend\ServiceManager\ServiceLocatorInterface $sl) {

        $this->sl = $sl;
        extract($data->toArray());
        $this->setTable($tabela);
        // Poxfix e o que completa o nome do arquivo ArquivoPosfix (ArquivoForm)
        $this->setPosfix("Controller");
        // E tanto o o nome do arquivo como o nome da class
        $this->setName($arquivo);
        // ex:Form, Entity, Service
        $this->setSubDir("Controller");
        // Montar o caminho base
        $aFind = array('DS', 'dirBase', 'dirEntity');
        $aSub = array(DIRECTORY_SEPARATOR, $alias, 'Controller');
        $dirBase = str_replace($aFind, $aSub, ".DSmoduleDSdirBaseDSsrcDSdirBaseDS");
        // Base dir geralmente e ./module/Modulo/src/Modulo
        $this->setBaseDir($dirBase);
        // Name Space ex:Modulo\Form
        $this->setNameSpace(sprintf("%s\Controller", $alias));
        // Se e uma extenção de outra classe set setExtends
        $this->setExtends("AbstractController");
        // set os use
        $this->setUses(array('Base\Controller\AbstractController' => null));
        $class = new \Zend\Code\Generator\ClassGenerator();
        if ($this->getUses()) {
            foreach ($this->getUses() as $key => $value) {
                $class->addUse($key, $value);
            }
        }

        $this->setBody('// Configurações iniciais do Controller');
        $this->setBody('$this->route = "%s/default";');
        $this->setBody('$this->controller = "%s";');
        $this->setBody('$this->action = "%s";');
        $this->setBody('$this->model = "%s\Model\%s";');
        $this->setBody('$this->table = "%s\Model\%sTable";');
        $this->setBody('$this->form = "%s\Form\%sForm";');
        $this->setBody('$this->template = "%s";');
      
        // gera os methods podemos erar mais de um repetindo o codigo
        $methodOption = array('name' => "__construct",
            'parameter' => array(),
            'shortDescription' => "construct do Table",
            'longDescription' => null,
            'datatype' => 'Base\Controller\AbstractController',
            'body' =>sprintf(implode(PHP_EOL, $this->getBody()),$route,$controller,$action_default,$alias,$arquivo,$alias,$arquivo,$alias,$arquivo,$template));
        $methodConstruct = new Methods($methodOption);
        $this->setMethod($methodConstruct);
        $this->setBody("limpa");
        
        $class->setName($this->getName())
                ->setNamespaceName($this->getNameSpace())
                ->setExtendedClass($this->getExtends())
                ->setDocblock($this->getDocblock())
                ->addProperties($this->getProperties())
                ->addConstants($this->getConstants())
                ->addMethods($this->getMethod());
        $this->setGenerateClasse($class);
       
    }

}
