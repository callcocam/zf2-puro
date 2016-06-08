<?php

namespace Auth\Form;

use Zend\Form\Form;

class AuthForm extends Form {

    public function __construct($name = null) {
        parent::__construct('auth');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'title',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'FILD_USER_NAME_LABEL',
            ),
        ));
        $this->add(array(
            'name' => 'password',
            'attributes' => array(
                'type' => 'password',
            ),
            'options' => array(
                'label' => 'FILD_USER_PASSWORD_LABEL',
            ),
        ));
        $this->add(array(
            'name' => 'rememberme',
            'type' => 'checkbox',
            'options' => array(
                'label' => 'FILD_REMEMBERME_LABEL',
                'checked_value' => 'true', //without value here will be 1
                'unchecked_value' => 'false', // witll be 1
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Acessar Minha Conta',
                'id' => 'submitbutton',
            ),
        ));
    }

}
