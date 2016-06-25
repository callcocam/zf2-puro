<?php

namespace Operacional\Form;

/**
 * BsResources [BsResources]
 *
 * @copyright (c) year, Claudio Coelho
 */
class BsCompaniesForm extends \Base\Form\AbstractForm {

    public function __construct($serviceLocator, $name = null, $options = array()) {
        parent::__construct($serviceLocator, 'BsCompanies', $options);
        //Não se esqueça de setar o inputFilter
        $this->setInputFilter(new BsCompaniesFilter($serviceLocator));



        //############################################ informações da coluna email ##############################################:

        $this->add(
                array(
                    "type" => "text",
                    "name" => "email",
                    "options" => array(
                        "label" => "FILD_EMAIL_LABEL",
                    ),
                    "attributes" => array(
                        "id" => "email",
                        "title" => "FILD_EMAIL_DESC",
                        "class" => "form-control input-sm",
                        "placeholder" => "FILD_EMAIL_PLACEHOLDER",
                        "data-access" => "3",
                        "data-position" => "geral",
                    ),
                )
        );

//############################################ informações da coluna facebook ##############################################:

        $this->add(
                array(
                    "type" => "text",
                    "name" => "facebook",
                    "options" => array(
                        "label" => "FILD_FACEBOOK_LABEL",
                    ),
                    "attributes" => array(
                        "id" => "facebook",
                        "title" => "FILD_FACEBOOK_DESC",
                        "class" => "form-control input-sm",
                        "placeholder" => "FILD_FACEBOOK_PLACEHOLDER",
                        "data-access" => "3",
                        "data-position" => "geral",
                    ),
                )
        );

//############################################ informações da coluna twitter ##############################################:

        $this->add(
                array(
                    "type" => "text",
                    "name" => "twitter",
                    "options" => array(
                        "label" => "FILD_TWITTER_LABEL",
                    ),
                    "attributes" => array(
                        "id" => "twitter",
                        "title" => "FILD_TWITTER_DESC",
                        "class" => "form-control input-sm",
                        "placeholder" => "FILD_TWITTER_PLACEHOLDER",
                        "data-access" => "3",
                        "data-position" => "geral",
                    ),
                )
        );

//############################################ informações da coluna phone ##############################################:

        $this->add(
                array(
                    "type" => "text",
                    "name" => "phone",
                    "options" => array(
                        "label" => "FILD_PHONE_LABEL",
                    ),
                    "attributes" => array(
                        "id" => "phone",
                        "title" => "FILD_PHONE_DESC",
                        "class" => "form-control input-sm",
                        "placeholder" => "FILD_PHONE_PLACEHOLDER",
                        "data-access" => "3",
                        "data-position" => "geral",
                    ),
                )
        );

//############################################ informações da coluna endereco ##############################################:

        $this->add(
                array(
                    "type" => "text",
                    "name" => "endereco",
                    "options" => array(
                        "label" => "FILD_ENDERECO_LABEL",
                    ),
                    "attributes" => array(
                        "id" => "endereco",
                        "title" => "FILD_ENDERECO_DESC",
                        "class" => "form-control input-sm",
                        "placeholder" => "FILD_ENDERECO_PLACEHOLDER",
                        "data-access" => "3",
                        "data-position" => "geral",
                    ),
                )
        );

//############################################ informações da coluna bairro ##############################################:

        $this->add(
                array(
                    "type" => "text",
                    "name" => "bairro",
                    "options" => array(
                        "label" => "FILD_BAIRRO_LABEL",
                    ),
                    "attributes" => array(
                        "id" => "bairro",
                        "title" => "FILD_BAIRRO_DESC",
                        "class" => "form-control input-sm",
                        "placeholder" => "FILD_BAIRRO_PLACEHOLDER",
                        "data-access" => "3",
                        "data-position" => "geral",
                    ),
                )
        );

//############################################ informações da coluna fantasia ##############################################:

        $this->add(
                array(
                    "type" => "text",
                    "name" => "fantasia",
                    "options" => array(
                        "label" => "FILD_FANTASIA_LABEL",
                    ),
                    "attributes" => array(
                        "id" => "fantasia",
                        "title" => "FILD_FANTASIA_DESC",
                        "class" => "form-control input-sm",
                        "placeholder" => "FILD_FANTASIA_PLACEHOLDER",
                        "data-access" => "3",
                        "data-position" => "geral",
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

//############################################ informações da coluna images ##############################################:

        $this->add(
                array(
                    "type" => "text",
                    "name" => "images",
                    "options" => array(
                        "label" => "FILD_IMAGES_LABEL",
                    ),
                    "attributes" => array(
                        "id" => "images",
                        "title" => "FILD_IMAGES_DESC",
                        "class" => "form-control input-sm",
                        "placeholder" => "FILD_IMAGES_PLACEHOLDER",
                        "data-access" => "3",
                        "data-position" => "images",
                    ),
                )
        );

//############################################ informações da coluna longetude ##############################################:

        $this->add(
                array(
                    "type" => "text",
                    "name" => "longetude",
                    "options" => array(
                        "label" => "FILD_LONGETUDE_LABEL",
                    ),
                    "attributes" => array(
                        "id" => "longetude",
                        "title" => "FILD_LONGETUDE_DESC",
                        "class" => "form-control input-sm",
                        "placeholder" => "FILD_LONGETUDE_PLACEHOLDER",
                        "data-access" => "3",
                        "data-position" => "geral",
                    ),
                )
        );

//############################################ informações da coluna latitude ##############################################:

        $this->add(
                array(
                    "type" => "text",
                    "name" => "latitude",
                    "options" => array(
                        "label" => "FILD_LATITUDE_LABEL",
                    ),
                    "attributes" => array(
                        "id" => "latitude",
                        "title" => "FILD_LATITUDE_DESC",
                        "class" => "form-control input-sm",
                        "placeholder" => "FILD_LATITUDE_PLACEHOLDER",
                        "data-access" => "3",
                        "data-position" => "geral",
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
    }

}
