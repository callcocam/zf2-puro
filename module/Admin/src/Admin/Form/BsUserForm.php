<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Form;

/**
 * Description of BsUserForm
 *
 * @author Ale
 */
class BsUserForm extends \Zend\Form\Form {

    /**
     * @return Zend\Form
     */
    public function __construct(array $options = array()) {
        // Configurações iniciais do Form
        parent::__construct("BsCategorias");
        $this->setAttribute("method", "post");
        $this->setAttribute("id", "Manager");
        $this->setAttribute("enctype", "multipart/form-data");
        $this->setAttribute("class", "form-horizontal formulario-configuracao");
        $this->setInputFilter(new BsUserFilter());
    }

}
