<?php

/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */

namespace Admin\Form;

use Base\Form\AbstractForm;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class BsUsersForm extends AbstractForm {

    /**
     * @return Zend\Form
     */
    public function __construct($serviceLocator) {
        // Configurações iniciais do Form
        parent::__construct($serviceLocator, "BsUsersForm");
        $this->setInputFilter(new BsUsersFilter($serviceLocator));


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
                    'type' => 'text',
                    'name' => 'facebook',
                    'options' => array(
                        'label' => 'FILD_FACEBOOK_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'facebook',
                        'title' => 'FILD_FACEBOOK_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_FACEBOOK_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna twitter ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'twitter',
                    'options' => array(
                        'label' => 'FILD_TWITTER_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'twitter',
                        'title' => 'FILD_TWITTER_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_TWITTER_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna phone ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'phone',
                    'options' => array(
                        'label' => 'FILD_PHONE_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'phone',
                        'title' => 'FILD_PHONE_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_PHONE_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna endereco ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'endereco',
                    'options' => array(
                        'label' => 'FILD_ENDERECO_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'endereco',
                        'title' => 'FILD_ENDERECO_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_ENDERECO_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna bairro ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'bairro',
                    'options' => array(
                        'label' => 'FILD_BAIRRO_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'bairro',
                        'title' => 'FILD_BAIRRO_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_BAIRRO_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna cidade ##############################################:
        $this->add(
                array(
                    'type' => 'select',
                    'name' => 'cidade',
                    'options' => array(
                        'label' => 'FILD_CIDADE_LABEL',
                        'value_options' => $this->setValueOption('Operacional\Model\BsCidadesTable'),
                        "disable_inarray_validator" => true,
                    ),
                    'attributes' => array(
                        'id' => 'cidade',
                        'title' => 'FILD_CIDADE_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_CIDADE_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna images_users ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'images',
                    'options' => array(
                        'label' => 'FILD_IMAGES_USERS_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'images',
                        'title' => 'FILD_IMAGES_USERS_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_IMAGES_USERS_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'images',
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
