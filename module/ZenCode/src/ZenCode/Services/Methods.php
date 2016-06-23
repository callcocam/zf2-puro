<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ZenCode\Services;

use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Description of Methods
 *
 * @author Call
 */
class Methods {

    protected $name;
    protected $shortDescription;
    protected $longDescription;
    protected $datatype;
    protected $parameter = array();
    protected $body;
    private $edit;
    protected $prefix;
    protected $sufix;

    public function __construct(array $options = array('name' => "Foo",
        'parameter' => array('name' => null, 'type' => null, 'value' => null),
        'shortDescription' => null,
        'longDescription' => null,
        'datatype' => 'string|null'), $edit = FALSE, $prefx = "", $sufix = "") {
        $this->edit = $edit;
        $this->prefix = $prefx;
        $this->sufix = $sufix;
        $hydrator = new ClassMethods();
        $hydrator->hydrate($options, $this);
    }

    /**
     * @return array
     */
    public function toArray() {
        $hydrator = new ClassMethods();
        return $hydrator->extract($this);
    }

    public function getName() {
        return $this->name;
    }

    public function getShortDescription() {
        return $this->shortDescription;
    }

    public function getLongDescription() {
        return $this->longDescription;
    }

    public function getDatatype() {
        return $this->datatype;
    }

    public function getParameter() {
        if (is_array($this->parameter)) {
            return $this->parameter;
        }
        return array($this->parameter);
    }

    public function getBody() {
        return $this->body;
    }

    public function setName($name) {
        if ($this->edit):
            $var = strtolower(utf8_encode($name));
            $name = ucwords(str_replace("_", " ", $var));
        endif;
        $name = preg_replace('{\W}', '', preg_replace('{ +}', '', strtr(
                                utf8_decode(html_entity_decode($name)), utf8_decode('ÀÁÃÂÉÊÍÓÕÔÚÜÇÑàáãâéêíóõôúüçñ'), 'AAAAEEIOOOUUCNaaaaeeiooouucn')));
        $this->name = sprintf("%s%s%s", $this->prefix, $name, $this->sufix);
        return $this;
    }

    public function setShortDescription($shortDescription) {
        $this->shortDescription = $shortDescription;
        return $this;
    }

    public function setLongDescription($longDescription) {
        $this->longDescription = $longDescription;
        return $this;
    }

    public function setDatatype($datatype) {
        $this->datatype = $datatype;
        return $this;
    }

    public function setParameter($parameters) {
        if ($parameters):
            foreach ($parameters as $parameter):
                extract($parameter);
                if (!is_null($name)):
                    $parameterarray = new \Zend\Code\Generator\ParameterGenerator();
                    $parameterarray->setName($name);
                    $parameterarray->setType($type);
                    if ($value !== false) {
                        $parameterarray->setDefaultValue(new \Zend\Code\Generator\ValueGenerator($value));
                    }
                    $this->parameter[]=$parameterarray;
                endif;
            endforeach;

        endif;
        return $this;
    }

    public function setBody($body) {
        $this->body = $body;
        return $this;
    }

}
