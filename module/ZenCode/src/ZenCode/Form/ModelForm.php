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
                        'label' => 'TIPO DE ARQUIVO:',
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
        //############################################ informações da coluna tabela ##############################################:
        $this->add(
                array(
                    'type' => 'textarea',
                    'name' => 'description',
                    'options' => array(
                        'label' => 'DESCRIÇÃO DA MODEL:',
                    ),
                    'attributes' => array(
                        'id' => 'description',
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
            'name' => 'refresh',
            'options' => array(
                        'label' => 'RESTAURAR:',
                    ),
            'attributes' => array(
                'type' => 'button',
                'value' => 'BTN_REFRESH_LABEL',
                'title' => 'BTN_REFRESH_DESC',
                'class' => 'btn btn-blue refresh-zen-code',
                'id' => 'refresh-zen-code',
            ),
        ));
    }

}
