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
        //############################################ informações da coluna tabela ##############################################:
        $this->add(
                array(
                    'type' => 'textarea',
                    'name' => 'description',
                    'options' => array(
                        'label' => 'DESCRIÇÃO DA MODEL:',
                    ),
                    'attributes' => array(
                        'id' => 'model-class',
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
                        'id' => 'caminho-model',
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
