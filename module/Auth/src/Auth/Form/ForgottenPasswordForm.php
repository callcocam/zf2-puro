<?php

namespace Auth\Form;

use Base\Form\AbstractForm;

class ForgottenPasswordForm extends AbstractForm {

    public function __construct($serviceLocator) {
        parent::__construct(" ForgottenPassword");
        $this->setInputFilter(new ForgottenPasswordFilter($serviceLocator));
        $this->serviceLocator = $serviceLocator;

        $this->add(array(
            'name' => 'email',
            'attributes' => array(
                'type' => 'email',
                'class' => 'form-control'
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
                'class' => 'btn btn-info'
            ),
        ));
    }

}
