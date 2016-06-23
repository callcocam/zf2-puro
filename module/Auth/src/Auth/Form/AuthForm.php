<?php

namespace Auth\Form;



class AuthForm extends \Zend\Form\Form {

    public function __construct($serviceLocator) {
        parent::__construct('auth');
    
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
        
          $this->add(array(
            'type' => 'Zend\Form\Element\Csrf',
            'name' => 'security',
            'options' => array(
                'csrf_options' => array(
                    'timeout' => 600
                )
            )
        ));
    }

}
