<?php

namespace ZenCode\Services;

/**
 * BsImages [TIPO]
 *
 * @copyright (c) year, Claudio Coelho
 */
class GerarForm extends Options {

    protected $tabelaElements;
    protected $attr = array('id', 'title', 'requerid', 'valor_padrao', 'placeholder', 'readonly', 'class', 'style', 'multiple', 'rows', 'cols', 'min', 'max', 'step', 'data-access', 'data-position');
    protected $attrHidden = array('value');

    public function __construct($data, \Zend\ServiceManager\ServiceLocatorInterface $sl) {

        $this->sl = $sl;
        extract($data->toArray());
        $this->setTable($tabela);
        $this->tabelaElements = $this->sl->get('Operacional\Model\BsElementsTable')->findBy(['asset_id' => md5($tabela)]);
        // Poxfix e o que completa o nome do arquivo ArquivoPosfix (ArquivoForm)
        $this->setPosfix("Form");
        // E tanto o o nome do arquivo como o nome da class
        $this->setName($arquivo);
        // ex:Form, Entity, Service
        $this->setSubDir("Form");
        // Montar o caminho base
        $aFind = array('DS', 'dirBase', 'dirEntity');
        $aSub = array(DIRECTORY_SEPARATOR, $alias, 'Model');
        $dirBase = str_replace($aFind, $aSub, ".DSmoduleDSdirBaseDSsrcDSdirBaseDS");
        // Base dir geralmente e ./module/Modulo/src/Modulo
        $this->setBaseDir($dirBase);
        // Name Space ex:Modulo\Form
        $this->setNameSpace(sprintf("%s\Form", $alias));
        // Se e uma extenção de outra classe set setExtends
        $this->setExtends("AbstractForm");
        // set os use
        $this->setUses(array('Base\Form\AbstractForm' => null, 'Zend\ServiceManager\ServiceLocatorInterface' => null));
        $class = new \Zend\Code\Generator\ClassGenerator();
        if ($this->getUses()) {
            foreach ($this->getUses() as $key => $value) {
                $class->addUse($key, $value);
            }
        }
        $this->setBody('// Configurações iniciais do Form');
        $this->setBody('parent::__construct($serviceLocator, "' . $arquivo . '", $options);');
        $this->setBody('$this->setInputFilter(new  ' . $arquivo . 'Filter());');
        // gera os methods podemos erar mais de um repetindo o codigo
        if ($this->tabelaElements):
            foreach ($this->tabelaElements as $value):
                if (!array_search($value->getName(), self::$ignore)):
                    $this->setBody($this->addElement(array_filter($value->toArray())));
                endif;
            endforeach;
        endif;
        $methodOption = array('name' => "__construct",
            'parameter' => array(array('name' => "serviceLocator", 'type' => null, 'value' => false), array('name' => "options", 'type' => 'array', 'value' => array())),
            'shortDescription' => "construct do Table",
            'longDescription' => null,
            'datatype' => 'Base\Form\AbstractForm',
            'body' => implode(PHP_EOL, $this->getBody()));
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
        //$this->generateClass();
    }

    public function addElement($element) {


        extract($element);
        $element['data-access'] = $access;
        $element['data-position'] = $position;
        $element['title'] = $description;
        $options = $this->setOptions($element);
        $attributes = $this->setAttr($element);

        $body = <<<'EOT'
            //############################################ informações da coluna %s ##############################################:
		    $this->add(
	                array(
	                    'type' => '%s',
	                    'name' => '%s',
	                    'options' => %s,
	                    'attributes' => %s,
	                )
	            );
EOT;

        return sprintf($body, $name, $type, $name, $options, $attributes) . PHP_EOL . PHP_EOL;
    }

    public function setAttr($element) {
        extract($element);
        $attributes[] = "array(";
        $attributes[] = "                                'id'=>'{$name}',";
        if ($type == "hidden") {
            if (isset($element['valor_padrao'])):
                $value = $this->valorPadrao($element['valor_padrao']);
                if (!empty($value)) {
                    $attributes[] = "                                'value'=>{$value},";
                }
            endif;

            $attributes[] = "                               'data-access' =>'{$access}',";
            $attributes[] = "                                'data-position' => '{$position}'";
        } else {
            foreach ($element as $key => $value) {
                // verifica se faz parte dos atributos
                if (array_search($key, $this->attr)) {
                    // substituir o valor padrão por aguma ação ou valor
                    $attributes[] = "                                '{$key}'=>'{$value}',";
                }
            }
        }
        $attributes[] = "    	        	        )";
        return implode(PHP_EOL, $attributes);
    }

    public function setOptions($element) {
        extract($element);
        $options[] = "array(";
        $options[] = "             			'label' => '{$label}',";
        if ($element['type'] == 'checkbox') {
            $options[] = $this->setOptionCheckbox($element);
        }
        if ($type == 'select') {
            $value_options = $this->valorPadrao($value_options);
            $options[] = "                    		'value_options'      =>array(),";
            $options[] = '				"disable_inarray_validator" => true,';
        }

        $options[] = "             		   	 )";
        return implode(PHP_EOL, $options);
    }

    /**
     * @param $data
     * @return string
     */
    private function setOptionCheckbox() {
        $options[] = "                    'use_hidden_element'        =>true,";
        $options[] = "                    'checked_value'             =>1,";
        $options[] = "                    'unchecked_value'           =>0,";
        return implode(PHP_EOL, $options);
    }

}
