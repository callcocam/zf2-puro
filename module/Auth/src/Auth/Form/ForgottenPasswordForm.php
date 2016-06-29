<?php

namespace Auth\Form;



class ForgottenPasswordForm extends \Zend\Form\Form {

    public function __construct($serviceLocator) {
        parent::__construct(" ForgottenPassword");
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
                'style' => 'margin-top:5px',
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
            ),
            'attributes' => array(
                'data-access' => '3',
                'data-position' => 'geral',
            )
        ));
    }

}
