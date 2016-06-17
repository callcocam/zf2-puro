<?php

/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */

namespace Auth\Form;

use Base\Form\AbstractForm;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class BsUsersCreateForm extends AbstractForm {

    /**
     * @return Zend\Form
     */
    public function __construct($serviceLocator) {
        // Configurações iniciais do Form
        parent::__construct($serviceLocator, "BsUsersCreateForm");
        $this->setInputFilter(new BsUsersFilter($serviceLocator));
      
        //############################################ informações da coluna asset_id ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'asset_id',
                    'options' => array(
                        'label' => 'FILD_ASSET_ID_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'asset_id',
                        'value' => 'aeab2f6de9fd7dfc9d3623ca09b6482d',
                         'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna empresa ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'empresa',
                    'options' => array(
                        'label' => 'FILD_EMPRESA_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'empresa',
                        'value' => $this->authservice['empresa'],
                         'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna title ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'title',
                    'options' => array(
                        'label' => 'FILD_TITLE_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'title',
                        'title' => 'FILD_TITLE_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_TITLE_PLACEHOLDER',
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
                        'value_options' => $this->setValueOption('Admin\Model\BsCidadesTable'),
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
                    'type' => 'Zend\Form\Element\Image',
                    'name' => 'images',
                    'options' => array(
                        'label' => 'FILD_IMAGE_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'images',
                        'src' => '/img/no_avatar.jpg',
                        'class' => 'img-responsive',
                        'style' => 'width:100px;heith:100px',
                        'title' => 'FILD_IMAGE_TITLE',
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
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );
        //############################################ informações da coluna role_id ##############################################:
        $this->add(
                array(
                    'type' => 'select',
                    'name' => 'role_id',
                    'options' => array(
                        'label' => 'FILD_ROLE_ID_LABEL',
                        'value_options' => $this->getRoles($this->authservice['role_id']),
                        "disable_inarray_validator" => true,
                    ),
                    'attributes' => array(
                        'id' => 'role_id',
                        'title' => 'FILD_ROLE_ID_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_ROLE_ID_PLACEHOLDER',
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
                        'data-access' => '3',
                        'data-position' => 'geral',
                        'value' => $this->authservice['id'],
                         'data-access' => '3',
                        'data-position' => 'controle',
                    ),
                )
        );


        //############################################ informações da coluna alias ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'alias',
                    'options' => array(
                        'label' => 'FILD_ALIAS_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'alias',
                        'title' => 'FILD_ALIAS_DESC',
                        'class' => 'form-control',
                        'placeholder' => 'FILD_ALIAS_PLACEHOLDER',
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
                    'options' => array(
                        'label' => 'FILD_MODIFIED_BY_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'modified_by',
                        'value' => $this->authservice['id'],
                        'data-access' => '3',
                        'data-position' => 'controle',
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
                        'data-access' => '3',
                        'data-position' => 'controle',
                    ),
                )
        );


        //############################################ informações da coluna state ##############################################:
        $this->add(
                array(
                    'type' => 'select',
                    'name' => 'state',
                    'options' => array(
                        'label' => 'FILD_STATE_LABEL',
                        'value_options' => self::$STATE,
                        "disable_inarray_validator" => true,
                    ),
                    'attributes' => array(
                        'id' => 'state',
                        'title' => 'FILD_STATE_DESC',
                        'class' => 'form-control',
                        'placeholder' => 'FILD_STATE_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'controle',
                    ),
                )
        );


        //############################################ informações da coluna access ##############################################:
        $this->add(
                array(
                    'type' => 'select',
                    'name' => 'access',
                    'options' => array(
                        'label' => 'FILD_ACCESS_LABEL',
                        'value_options' => self::$STATE,
                        "disable_inarray_validator" => true,
                    ),
                    'attributes' => array(
                        'id' => 'access',
                        'title' => 'FILD_ACCESS_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_ACCESS_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'controle',
                    ),
                )
        );


        //############################################ informações da coluna created ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'created',
                    'options' => array(
                        'label' => 'FILD_CREATED_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'created',
                        'title' => 'FILD_CREATED_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_CREATED_PLACEHOLDER',
                        'readonly' => true,
                        'value' => date("d-m-Y"),
                        'data-access' => '3',
                        'data-position' => 'datas',
                    ),
                )
        );


        //############################################ informações da coluna modified ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'modified',
                    'attributes' => array(
                        'id' => 'modified',
                        'value' => date("d-m-Y H:i:s"),
                        'data-access' => '3',
                        'data-position' => 'datas',
                    ),
                )
        );


        //############################################ informações da coluna publish_up ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'publish_up',
                    'options' => array(
                        'label' => 'FILD_PUBLISH_UP_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'publish_up',
                        'title' => 'FILD_PUBLISH_UP_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_PUBLISH_UP_PLACEHOLDER',
                        'value' => date("d-m-Y H:i:s"),
                        'data-access' => '3',
                        'data-position' => 'datas',
                    ),
                )
        );


        //############################################ informações da coluna publish_down ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'publish_down',
                    'options' => array(
                        'label' => 'FILD_PUBLISH_DOWN_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'publish_down',
                        'title' => 'FILD_PUBLISH_DOWN_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_PUBLISH_DOWN_PLACEHOLDER',
                        'value' => date("d-m-Y H:i:s"),
                        'data-access' => '3',
                        'data-position' => 'datas',
                    ),
                )
        );
    }

}
