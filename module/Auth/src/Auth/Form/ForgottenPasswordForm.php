<?php

namespace Auth\Form;

use Base\Form\AbstractForm;

class ForgottenPasswordForm extends AbstractForm {

    public function __construct($serviceLocator) {
        parent::__construct($serviceLocator," ForgottenPassword");
        $this->setInputFilter(new ForgottenPasswordFilter($serviceLocator));
        

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
                'style'=>'margin-top:5px',
                'class' => 'btn btn-blue fl-right'
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
