<?php

namespace Auth\Form;

use Base\Form\AbstractForm;

class RegistrationForm extends AbstractForm {

    public function __construct($serviceLocator) {
        $this->wordLen=2;
        parent::__construct($serviceLocator,"Registration");
        $this->setInputFilter(new RegistrationFilter($serviceLocator));
             
        //############################################ informações da coluna id ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'id',
                    'attributes' => array(
                        'id' => 'id',
                        'value' => 'AUTOMATICO',
                    ),
                )
        );


        //############################################ informações da coluna codigo ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'codigo',
                    'attributes' => array(
                        'id' => 'codigo',
                        'value' => '{codigo}',
                    ),
                )
        );


        //############################################ informações da coluna asset_id ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'asset_id',
                    'attributes' => array(
                        'id' => 'asset_id',
                        'value' => 'aeab2f6de9fd7dfc9d3623ca09b6482d',
                    ),
                )
        );


        //############################################ informações da coluna empresa ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'empresa',
                    'attributes' => array(
                        'id' => 'empresa',
                        'value' => $this->empresa['id'],
                    ),
                )
        );


        //############################################ informações da coluna title ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'title',
                    'options' => array(
                        'label' => 'FILD_USER_TITLE_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'title',
                        'title' => 'FILD_USER_TITLE_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_USER_TITLE_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna email ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'email',
                    'options' => array(
                        'label' => 'FILD_EMAIL_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'email',
                        'title' => 'FILD_EMAIL_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_EMAIL_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna facebook ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'facebook',
                    'attributes' => array(
                        'id' => 'facebook',
                        'value' => 'facebook.com/',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna twitter ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'twitter',
                    'attributes' => array(
                        'id' => 'twitter',
                        'value' => 'twitter.com',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna phone ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'phone',
                    'attributes' => array(
                        'id' => 'phone',
                        'value' => '(00)0000-0000',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna endereco ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'endereco',
                    'attributes' => array(
                        'id' => 'endereco',
                        'value' => 'Não Definido',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna bairro ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'bairro',
                    'attributes' => array(
                        'id' => 'bairro',
                        'value' => '0',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna cidade ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'cidade',
                    'attributes' => array(
                        'id' => 'cidade',
                        'value' => '23746',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna images_users ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'images',
                    'attributes' => array(
                        'id' => 'images',
                        'value' => '/img/no_avatar.jpg',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna password ##############################################:
        $this->add(
                array(
                    'type' => 'password',
                    'name' => 'password',
                    'options' => array(
                        'label' => 'FILD_PASSWORD_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'password',
                        'title' => 'FILD_PASSWORD_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_PASSWORD_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );

        //############################################ informações da coluna usr_password_confirm ##############################################:
        $this->add(
                array(
                    'type' => 'password',
                    'name' => 'usr_password_confirm',
                    'options' => array(
                        'label' => 'FIL_USER_CONFIRM_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'usr_password_confirm',
                        'title' => 'FILD_USER_CONFIRM_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_USER_CONFIRM_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );

        //############################################ informações da coluna usr_registration_token ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'usr_registration_token',
                    'attributes' => array(
                        'id' => 'usr_registration_token',
                        'value' => '',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );

        //############################################ informações da coluna role_id ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'role_id',
                    'attributes' => array(
                        'id' => 'role_id',
                        'value' => '5',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna description ##############################################:
        $this->add(
                array(
                    'type' => 'textarea',
                    'name' => 'description',
                    'options' => array(
                        'label' => 'FILD_DESCRIPTION_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'description',
                        'title' => 'FILD_DESCRIPTION_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_DESCRIPTION_PLACEHOLDER',
                        'rows' => '5',
                        'cols' => '20',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna created_by ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'created_by',
                    'attributes' => array(
                        'id' => 'created_by',
                        'value' => self::$DAFAULT_USER,
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna alias ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'alias',
                    'attributes' => array(
                        'id' => 'alias',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );
        //############################################ informações da coluna modified_by ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'modified_by',
                    'attributes' => array(
                        'id' => 'modified_by',
                        'value' => self::$DAFAULT_USER,
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );

        //############################################ informações da coluna ordering ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'ordering',
                    'attributes' => array(
                        'id' => 'ordering',
                        'value' => '0',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna state ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'state',
                    'attributes' => array(
                        'id' => 'state',
                        'value' => self::$DAFAULT_STATE,
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna access ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'access',
                    'attributes' => array(
                        'id' => 'access',
                        'value' => self::$DAFAULT_ACCESS,
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna created ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'created',
                    'options' => array(
                        'label' => 'FILD_CREATED_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'created',
                        'value' => date("d-m-Y"),
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna modified ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'modified',
                    'options' => array(
                        'label' => 'FILD_MODIFIED_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'modified',
                        'value' => date("d-m-Y H:i:s"),
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna publish_up ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'publish_up',
                    'options' => array(
                        'label' => 'FILD_PUBLISH_UP_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'publish_up',
                        'value' => date("d-m-Y H:i:s"),
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna publish_down ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'publish_down',
                    'options' => array(
                        'label' => 'FILD_PUBLISH_DOWN_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'publish_down',
                        'value' => date("d-m-Y H:i:s"),
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );
        //############################################ informações da coluna publish_up ##############################################:

        $this->add([
            'type' => 'Zend\Form\Element\Captcha',
            'name' => 'captcha',
            'options' => [
                'label' => 'Por favor verificar que você é humano.',
                'captcha' => $this->captchaImage,
            ],
            'attributes' => ['class' => 'form-control',
                'placeholder' => 'Digite O Texto Acima',]
        ]);
        
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
