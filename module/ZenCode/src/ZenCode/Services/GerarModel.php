<?php

namespace ZenCode\Services;

use Zend\Code\Generator\MethodGenerator;

/**
 * BsImages [TIPO]
 *
 * @copyright (c) year, Claudio Coelho
 */
class GerarModel extends Options {

    public function __construct($data, \Zend\ServiceManager\ServiceLocatorInterface $sl) {

        $this->sl = $sl;
        extract($data->toArray());
        $this->setTable($tabela);
        // Poxfix e o que completa o nome do arquivo ArquivoPosfix (ArquivoForm)
        $this->setPosfix("");
        // E tanto o o nome do arquivo como o nome da class
        $this->setName($arquivo);
        // ex:Form, Entity, Service
        $this->setSubDir("Model");
        // Montar o caminho base
        $aFind = array('DS', 'dirBase', 'dirEntity');
        $aSub = array(DIRECTORY_SEPARATOR, $alias, 'Model');
        $dirBase = str_replace($aFind, $aSub, ".DSmoduleDSdirBaseDSsrcDSdirBaseDS");
        // Base dir geralmente e ./module/Modulo/src/Modulo
        $this->setBaseDir($dirBase);
        // Name Space ex:Modulo\Form
        $this->setNameSpace(sprintf("%s\Model", $alias));
        // Se e uma extenção de outra classe set setExtends
        $this->setExtends("AbstractModel");
        // set os use
        $this->setUses(array('Base\Model\AbstractModel' => null));
        $class = new \Zend\Code\Generator\ClassGenerator();
        if ($this->getUses()) {
            foreach ($this->getUses() as $key => $value) {
                $class->addUse($key, $value);
            }
        }
        $this->addMethods($tabela);
        $this->gerarPropertys($tabela);
        $class->setName($this->getName())
                ->setNamespaceName($this->getNameSpace())
                ->setExtendedClass($this->getExtends())
                ->setDocblock($this->getDocblock())
                ->addProperties($this->getProperties())
                ->addConstants($this->getConstants())
                ->addMethods($this->getMethod());
        $this->setGenerateClasse($class);
        $this->generateClass();
    }

    public function gerarPropertys($tabela) {

        foreach ($this->getTable()->getColumns() as $value) {
            extract($value);
            if (!array_search($name, self::$ignore)):
                $this->setProperties(['name' => $name, 'value' => '', 'flag' => 'FLAG_PROTECTED']);
            endif;
        }
    }

    public function addMethods($tabela) {
        $method = new MethodGenerator();
        $colunas = $this->getTable()->getColumns();
        foreach ($colunas as $value) {
            extract($value);
            if (!array_search($name, self::$ignore)):
                // gera os methods podemos erar mais de um repetindo o codigo
                $this->setBody(sprintf('return $this->%s;', $name));
                $method = array('name' => $name,
                    'parameter' => array(array('name' => null, 'type' => null, 'value' => $columnDefault)),
                    'shortDescription' => "get {$name}",
                    'longDescription' => null,
                    'datatype' => "{$dataType}",
                    'body' => implode(PHP_EOL, $this->getBody()));
                $methodSave = new Methods($method, TRUE, "get");
                $this->setBody("limpa");
                $this->setMethod($methodSave);

            endif;
        }

        foreach ($colunas as $value) {
            extract($value);
            if (!array_search($name, self::$ignore)):
                // gera os methods podemos erar mais de um repetindo o codigo
                $this->setBody(sprintf('$this->%s=$%s;', $name, $name));
                $this->setBody('return $this;');
                $method = array('name' => $name,
                    'parameter' => array(array('name' => $name, 'type' => null, 'value' => $columnDefault)),
                    'shortDescription' => "set {$name}",
                    'longDescription' => null,
                    'datatype' => "{$dataType}",
                    'body' => implode(PHP_EOL, $this->getBody()));
                $methodSave = new Methods($method, TRUE, "set");
                $this->setBody("limpa");
                $this->setMethod($methodSave);
            endif;
        }
    }

}
