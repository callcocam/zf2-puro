<?php

namespace Auth\Form;

use Zend\Form\Form;

class ForgottenPasswordForm extends Form {

    public function __construct($name = null) {
        parent::__construct('registration');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'email',
            'attributes' => array(
                'type' => 'email',
            ),
            'options' => array(
                'label' => 'FILD_EMAIL_LABEL',
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Recuperar',
                'id' => 'submitbutton',
            ),
        ));
    }

}
