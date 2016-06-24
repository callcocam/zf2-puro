<?php

namespace ZenCode\Services;

/**
 * BsImages [TIPO]
 *
 * @copyright (c) year, Claudio Coelho
 */
class GerarFilter extends Options {

    protected $tabelaElements;

    public function __construct($data, \Zend\ServiceManager\ServiceLocatorInterface $sl) {

        $this->sl = $sl;
        extract($data->toArray());
        $this->setTable($tabela);
        $this->tabelaElements = $this->sl->get('Admin\Model\BsElementsTable')->findBy(['asset_id' => md5($tabela)]);
        // Poxfix e o que completa o nome do arquivo ArquivoPosfix (ArquivoForm)
        $this->setPosfix("Fiter");
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
        $this->setExtends("AbstractFilter");
        // set os use
        $this->setUses(array('Base\Form\AbstractFilter' => null, 'Zend\InputFilter\Input' => null
            , 'Zend\InputFilter\InputFilter' => null
            , 'Zend\Validator\NotEmpty' => null
            , 'Zend\Validator\EmailAddress' => null
            , 'Zend\Validator\Identical' => null
            , 'Zend\Filter\StripTags' => null
            , 'Zend\Filter\StringTrim' => null));

        $class = new \Zend\Code\Generator\ClassGenerator();
        if ($this->getUses()) {
            foreach ($this->getUses() as $key => $value) {
                $class->addUse($key, $value);
            }
        }
        $this->setBody('$this->inputFilter = new InputFilter ();');
        $this->setBody('$this->emptyfilter = new NotEmpty ();');
        $this->setBody('$this->emailfilter = new EmailAddress ();');
        $this->setBody('$this->identca = new Identical ();');
        $this->setBody('$this->StripTags = new StripTags ();');
        $this->setBody('$this->StringTrim = new StringTrim ();');
        $this->setBody('$this->emptyfilter->setMessage("Campo Obrigatorio.", NotEmpty::IS_EMPTY);');
        $this->setBody('$this->emailfilter->setMessage("O Formato Do Email Não E valido", EmailAddress::INVALID_FORMAT);');
        $this->setBody('$this->identca->setToken("password");');
        $this->setBody('$this->identca->setMessage("O Campo Repita Senha de ser Igual Ao campo Senha", Identical::MISSING_TOKEN);');
        $this->setBody('$this->serviceLocator = $serviceLocator;');

        if ($this->tabelaElements):
            foreach ($this->tabelaElements as $value):
                $this->setBody($this->addMethodBody($value->toArray()));
            endforeach;
        endif;
        // gera os methods podemos erar mais de um repetindo o codigo
        $methodOption = array('name' => "__construct",
            'parameter' => array(array('name' => "serviceLocator", 'type' => null, 'value' => false)),
            'shortDescription' => "construct do Fultir",
            'longDescription' => null,
            'datatype' => 'Base\Form\AbstractFilter',
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

    public function addMethodBody($options) {
        extract($options);
        if (isset($requerid)):
            $empty = $requerid == 1 ? '' : '//';
            $filter = $requerid == 1 ? 'true' : 'false';
        else:
            $empty = '//';
            $filter = 'false';
        endif;

        $stpTag = $type == "textarea" ? '//' : '';

        $body = '// Informação para a coluna %s:' . PHP_EOL;
        $body.='$' . $name . ' = new Input ( "%s" );' . PHP_EOL;
        $body.='$' . $name . '->setRequired ( %s );' . PHP_EOL;
        $body.='$' . $name . '->getFilterChain ()->attach ( $StringTrim );' . PHP_EOL;
        $body.=$stpTag . '$' . $name . '->getFilterChain ()->attach ( $StripTags );' . PHP_EOL;
        $body.=$empty . '$' . $name . '->getValidatorChain()->attach($emptyfilter);' . PHP_EOL;
        $body.='$this->add ( $' . $name . ' );' . PHP_EOL;
        return sprintf($body, $name, $name, $filter);
    }

}
