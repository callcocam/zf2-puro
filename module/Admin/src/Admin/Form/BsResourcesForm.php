<?php

namespace Admin\Form;

/**
 * BsResources [BsResources]
 *
 * @copyright (c) year, Claudio Coelho
 */
class BsResourcesForm extends \Base\Form\AbstractForm {

    public function __construct($serviceLocator, $name = null, $options = array()) {
        parent::__construct($serviceLocator, 'BsResources', $options);
        //Não se esqueça de setar o inputFilter
        $this->setInputFilter(new BsResourcesFilter($serviceLocator));
        //############################################ informações da coluna id ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'id',
                    'options' => array(
                        'label' => 'FILD_ID_LABEL',
                    ),
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
                    'options' => array(
                        'label' => 'FILD_CODIGO_LABEL',
                    ),
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
                    'options' => array(
                        'label' => 'FILD_ASSET_ID_LABEL',
                    ),
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
                    'options' => array(
                        'label' => 'FILD_EMPRESA_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'empresa',
                        'value' => $this->authservice['empresa'],
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

        //############################################ informações da coluna template ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'template',
                    'options' => array(
                        'label' => 'FILD_TEMPLATE_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'template',
                        'title' => 'FILD_TEMPLATE_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_TEMPLATE_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'geral',
                        'value'=>'/admin/admin/listar'
                    ),
                )
        );


        //############################################ informações da coluna group_id ##############################################:
        $this->add(
                array(
                    'type' => 'select',
                    'name' => 'group_id',
                    'options' => array(
                        'label' => 'FILD_GROUP_ID_LABEL',
                        'value_options' => self::$GROUP_ID,
                        "disable_inarray_validator" => true,
                    ),
                    'attributes' => array(
                        'id' => 'group_id',
                        'title' => 'FILD_GROUP_ID_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_GROUP_ID_PLACEHOLDER',
                        'value' => 2,
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );
        
        
        //############################################ informações da coluna tipo_modulo ##############################################:
        $this->add(
                array(
                    'type' => 'select',
                    'name' => 'tipo_modulo',
                    'options' => array(
                        'label' => 'FILD_TIPO_MODULO_LABEL',
                        'value_options' => self::$TIPO_MODULO,
                        "disable_inarray_validator" => true,
                    ),
                    'attributes' => array(
                        'id' => 'tipo_modulo',
                        'title' => 'FILD_TIPO_MODULO_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_TIPO_MODULO_PLACEHOLDER',
                        'value' => 2,
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );



       

        //############################################ informações da coluna route ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'route',
                    'options' => array(
                        'label' => 'FILD_ROUTE_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'route',
                        'title' => 'FILD_ROUTE_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_ROUTE_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna controller ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'controller',
                    'options' => array(
                        'label' => 'FILD_CONTROLLER_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'controller',
                        'title' => 'FILD_CONTROLLER_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_CONTROLLER_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna action_default ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'action_default',
                    'options' => array(
                        'label' => 'FILD_ACTION_DEFAULT_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'action_default',
                        'title' => 'FILD_ACTION_DEFAULT_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_ACTION_DEFAULT_PLACEHOLDER',
                        'data-access' => '3',
                        'value' => 'index',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna arquivo ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'arquivo',
                    'options' => array(
                        'label' => 'FILD_ARQUIVO_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'arquivo',
                        'title' => 'FILD_ARQUIVO_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_ARQUIVO_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna module_id ##############################################:
        $this->add(
                array(
                    'type' => 'select',
                    'name' => 'module_id',
                    'options' => array(
                        'label' => 'FILD_MODULE_ID_LABEL',
                        'value_options' => self::$MODULE_PAI,
                        "disable_inarray_validator" => true,
                    ),
                    'attributes' => array(
                        'id' => 'module_id',
                        'title' => 'FILD_MODULE_ID_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_MODULE_ID_PLACEHOLDER',
                        'value' => 2,
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna tabela ##############################################:
        $this->add(
                array(
                    'type' => 'select',
                    'name' => 'tabela',
                    'options' => array(
                        'label' => 'FILD_TABELA_LABEL',
                        'value_options' => $this->getTabelas(),
                        "disable_inarray_validator" => true,
                    ),
                    'attributes' => array(
                        'id' => 'tabela',
                        'title' => 'FILD_TABELA_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_TABELA_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );
        //############################################ informações da coluna registro_page ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'registro_page',
                    'options' => array(
                        'label' => 'FILD_REGISTRO_PAGE_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'registro_page',
                        'title' => 'FILD_REGISTRO_PAGE_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_REGISTRO_PAGE_PLACEHOLDER',
                        'data-access' => '3',
                        'value' => 12,
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna colunas_linha ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'colunas_linha',
                    'options' => array(
                        'label' => 'FILD_COLUNAS_LINHA_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'colunas_linha',
                        'title' => 'FILD_COLUNAS_LINHA_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_COLUNAS_LINHA_PLACEHOLDER',
                        'data-access' => '3',
                        'value' => 4,
                        'data-position' => 'geral',
                    ),
                )
        );


        //put your code here
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
                        'value' => $this->authservice['empresa'],
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna alias ##############################################:
          $this->add(
                array(
                    'type' => 'select',
                    'name' => 'alias',
                    'options' => array(
                        'label' => 'FILD_ALIAS_LABEL',
                        'value_options' => self::$MODULES,
                        "disable_inarray_validator" => true,
                    ),
                    'attributes' => array(
                        'id' => 'alias',
                        'title' => 'FILD_ALIAS_DESC',
                        'class' => 'form-control input-sm',
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
                        'data-access' => '3',
                        'data-position' => 'geral',
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
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_STATE_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'geral',
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
                        'value_options' => $this->getRoles(),
                        "disable_inarray_validator" => true,
                    ),
                    'attributes' => array(
                        'id' => 'access',
                        'title' => 'FILD_ACCESS_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_ACCESS_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'geral',
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
                        'data-access' => '3',
                        'value' => date("d-m-Y"),
                        'data-position' => 'geral',
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
                        'data-position' => 'geral',
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
                        'readonly' => true,
                        'data-position' => 'geral',
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
                        'readonly' => true,
                        'data-position' => 'geral',
                    ),
                )
        );
    }

}
