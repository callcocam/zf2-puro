<?php

/*
 * Class Abstract para formularios
 * 
 */

namespace Base\Form;

/**
 * Description of AbstractForm
 *
 * @author Claudio
 */
class AbstractForm extends \Zend\Form\Form {

    protected $serviceLocator;

    public function __construct($name = null, $options = array()) {
        parent::__construct($name, $options);
        $this->setAttribute("method", "post");
        $this->setAttribute("enctype", "multipart/form-data");
        $this->setAttribute("class", "form-horizontal formulario-configuracao");
    }

    public function setValueOption($table, $condicao = array('state' => '0')) {
        $dados = $this->getServiceLocator()->get($table)->findALL();
        $valueOptions = array();
        if ($dados):
            foreach ($dados as $value):
                $valueOptions[$value->getId()] = $value->getTitle();
            endforeach;
        endif;
        return $valueOptions;
    }

    public function getServiceLocator() {
        return $this->serviceLocator;
    }

}
