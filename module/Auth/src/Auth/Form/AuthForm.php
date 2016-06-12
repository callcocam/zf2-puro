<?php

namespace Auth\Form;

use Base\Form\AbstractForm;

class AuthForm extends AbstractForm {

    public function __construct($serviceLocator) {
        parent::__construct($serviceLocator,'auth');
    
        $this->add(array(
            'name' => 'email',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'FILD_USER_EMAIL_LABEL',
            ),
        ));
        $this->add(array(
            'name' => 'password',
            'attributes' => array(
                'type' => 'password',
                'class' => 'form-control'
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
                'class' => 'btn btn-success'
            ),
        ));
    }

}
