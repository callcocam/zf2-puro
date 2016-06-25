<?php

namespace Operacional\Form;

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
                        'value' => '/admin/admin/listar'
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
                        'value_options' => $this->setValueOption('Operacional\Model\BsGruposTable'),
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
                        'data-position' => 'controle',
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
                        'data-position' => 'controle',
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
                        'data-position' => 'controle',
                    ),
                )
        );

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
                        'data-position' => 'controle',
                    ),
                )
        );
        
    }

}
