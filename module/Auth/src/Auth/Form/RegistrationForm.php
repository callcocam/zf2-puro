<?php

namespace Auth\Form;

use Zend\Form\Form;

class RegistrationForm extends Form {

    public function __construct($name = null) {
        parent::__construct('registration');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'title',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'FILD_USERNAME_LABEL',
            ),
        ));

        $this->add(array(
            'name' => 'email',
            'attributes' => array(
                'type' => 'email',
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
            'name' => 'usr_password_confirm',
            'attributes' => array(
                'type' => 'password',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'FIL_USER_CONFIRM_LABEL',
            ),
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Captcha',
            'name' => 'captcha',
            'attributes' => array(
                'id' => 'captcha',
                'class' => 'form-control'
            ),
            'options' => array(
                'label' => 'Please verify you are human',
                'captcha' => new \Zend\Captcha\Figlet(),
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Cadastrar',
                'class' => 'btn btn-danger',
                'id' => 'submitbutton',
            ),
        ));
    }

}
