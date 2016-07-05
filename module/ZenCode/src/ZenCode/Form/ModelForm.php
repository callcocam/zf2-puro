<?php

namespace ZenCode\Form;

/**
 * ColumnForm [ColumnForm]
 *
 * @copyright (c) year, Claudio Coelho
 */
class ModelForm extends \Zend\Form\Form {

    public function __construct($serviceLocator, $name = null, $options = array()) {
        parent::__construct('ModelForm', $options);
        //Não se esqueça de setar o inputFilter
        $this->setInputFilter(new UpdateFilter($serviceLocator));
        //$name, $length, $nullable = false, $default = null, array $options = array()
         //############################################ informações da coluna caminho ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'id',
                    'attributes' => array(
                        'id' => 'id',
                      ),
                )
        );
        $this->add(
                array(
                    'type' => 'select',
                    'name' => 'modulo',
                    'options' => array(
                        'label' => 'MODULO:',
                        'value_options' => array(),
                        "disable_inarray_validator" => true,
                    ),
                    'attributes' => array(
                        'id' => 'modulo',
                        'title' => 'FILD_MODULO_DESC',
                        'class' => 'form-control input-sm add-column',
                        'placeholder' => 'FILD_MODULO_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );
        $this->add(
                array(
                    'type' => 'select',
                    'name' => 'class',
                    'options' => array(
                        'label' => 'CLASSES:',
                        'value_options' =>[''=>'--Selecione--','model'=>"Model","table"=>"Table","controller"=>"Controller","form"=>"Form","filter"=>"Filter"],
                        "disable_inarray_validator" => true,
                    ),
                    'attributes' => array(
                        'id' => 'class',
                        'title' => 'FILD_CLASS_DESC',
                        'class' => 'form-control input-sm add-column',
                        'placeholder' => 'FILD_CLASS_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );
        
         $this->add(
                array(
                    'type' => 'select',
                    'name' => 'view',
                    'options' => array(
                        'label' => 'TIPO DE ARQUIVO:',
                        'value_options' =>[''=>'--Selecione--','index'=>"Listar","editar"=>"Editar","inserir"=>"Inserir","excluir"=>"Ecluir"],
                        "disable_inarray_validator" => true,
                    ),
                    'attributes' => array(
                        'id' => 'view',
                        'title' => 'FILD_VIEW_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_VIEW_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );
        //############################################ informações da coluna tabela ##############################################:
        $this->add(
                array(
                    'type' => 'textarea',
                    'name' => 'description',
                    'options' => array(
                        'label' => 'DESCRIÇÃO DA MODEL:',
                    ),
                    'attributes' => array(
                        'id' => 'description-edit-area',
                        'title' => 'Edita classe de model',
                        'class' => 'form-control',
                        'placeholder' => 'Use este campo para criar e editar modelos',
                        'rows'=>'50'
                    ),
                )
        );
        //############################################ informações da coluna caminho ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'caminho',
                    'options' => array(
                        'label' => 'CAMINHO DA PASTA:',
                    ),
                    'attributes' => array(
                        'id' => 'caminho',
                        'class' => 'form-control',
                        'readonly'=>true
                    ),
                )
        );

        $this->add(array(
            'name' => 'buscar',
            'options' => array(
                        'label' => 'BUSCAR OU RESTAURAR ARQUIVO:',
                    ),
            'attributes' => array(
                'type' => 'button',
                'value' => 'BUSCAR',
                'title' => 'BTN_BUSCAR_DESC',
                'class' => 'btn btn-green',
                'id' => 'buscar-zen-code',
                'style'=>"margin-right: 4px;"
            ),
        ));
           $this->add(array(
            'name' => 'refresh',
            'options' => array(
//                        'label' => 'BUSCAR OU RESTAURAR ARQUIVO:',
                    ),
            'attributes' => array(
                'type' => 'button',
                'value' => 'REFRESH',
                'title' => 'BTN_REFRESH_DESC',
                'class' => 'btn btn-blue refresh-zen-code',
                'id' => 'refresh-zen-code',
            ),
        ));
    }

}
