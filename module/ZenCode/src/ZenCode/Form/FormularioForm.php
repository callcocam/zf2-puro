<?php

namespace ZenCode\Form;

/**
 * ColumnForm [ColumnForm]
 *
 * @copyright (c) year, Claudio Coelho
 */
class FormularioForm extends \Zend\Form\Form {

    public function __construct($serviceLocator, $name = null, $options = array()) {
        parent::__construct('FormularioForm', $options);
        $this->setAttribute('id', 'update-class');
        //Não se esqueça de setar o inputFilter
        $this->setInputFilter(new UpdateFilter($serviceLocator));
        //$name, $length, $nullable = false, $default = null, array $options = array()
        //############################################ informações da coluna tabela ##############################################:
        $this->add(
                array(
                    'type' => 'textarea',
                    'name' => 'description',
                    'options' => array(
                        'label' => 'DESCRIÇÃO DO FORMULARIO:',
                    ),
                    'attributes' => array(
                        'id' => 'form-class',
                        'title' => 'Edita classe de formulario',
                        'class' => 'form-control',
                        'style'=>'height: 350px; width: 100%;',
                        'placeholder' => 'Use este campo para criar e editar formularios',
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
                        'id' => 'caminho-form',
                        'class' => 'form-control',
                        'readonly'=>true
                    ),
                )
        );

        $this->add(array(
            'name' => 'save',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'BTN_SAVE_LABEL',
                'title' => 'BTN_SAVE_DESC',
                'class' => 'btn btn-green submitbutton',
                'id' => 'save',
            ),
        ));
    }

}
