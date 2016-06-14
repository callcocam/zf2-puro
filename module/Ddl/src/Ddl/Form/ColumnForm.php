<?php

namespace Ddl\Form;

/**
 * ColumnForm [ColumnForm]
 *
 * @copyright (c) year, Claudio Coelho
 */
class ColumnForm extends \Base\Form\AbstractForm {

    public function __construct($serviceLocator, $name = null, $options = array()) {
        parent::__construct($serviceLocator, 'ColumnForm', $options);
        //Não se esqueça de setar o inputFilter
        $this->setInputFilter(new ColumnFilter($serviceLocator));
        //$name, $length, $nullable = false, $default = null, array $options = array()
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
        //############################################ informações da coluna title ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'name',
                    'options' => array(
                        'label' => 'FILD_NAME_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'name',
                        'title' => 'FILD_NAME_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_NAME_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );

        //############################################ informações da coluna type ##############################################:
        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'type',
            'options' => array(
                'label' => 'FILD_TYPE_LABEL',
                'value_options' => array(
                    'Blob' => 'Blob',
                    'Boolean' => 'Boolean',
                    'Char' => 'Char',
                    'Date' => 'Date',
                    'Decimal' => 'Decimal',
                    'Float' => 'Float',
                    'Integer' => 'Integer',
                    'Time' => 'Time',
                    'Varchar' => 'Varchar',
                ),
            ),
            'attributes' => array(
                'id' => 'type',
                'title' => 'FILD_TYPE_DESC',
                'class' => 'form-control input-sm',
                'placeholder' => 'FILD_TYPE_PLACEHOLDER',
                'data-access' => '3',
                'data-position' => 'geral',
            ),
        ));

        //############################################ informações da coluna length ##############################################:
        $this->add(array(
            'type' => 'Zend\Form\Element\Number',
            'name' => 'length',
            'options' => array(
                'label' => 'FILD_LENGTH_LABEL'
            ),
            'attributes' => array(
                'min' => 0, // default minimum is 0
                'max' => 255, // default maximum is 100
                'step' => 1, // default interval is 1
                'id' => 'length',
                'title' => 'FILD_LENGTH_DESC',
                'class' => 'form-control input-sm',
                'data-access' => '3',
                'data-position' => 'geral',
            )
        ));
        //############################################ informações da coluna nullable ##############################################:

        $this->add(array(
            'type' => 'Zend\Form\Element\Checkbox',
            'name' => 'nullable',
            'options' => array(
                'label' => 'FILD_NULLABLE_LABEL',
                'use_hidden_element' => true,
                'checked_value' => true,
                'unchecked_value' => false
            ),
            'attributes' => array(
                'value' => 'yes',
                'id' => 'nullable',
                'title' => 'FILD_NULLABLE_DESC',
            )
        ));

        //put your code here
        //############################################ informações da coluna description ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'description',
                    'options' => array(
                        'label' => 'FILD_DESCRIPTION_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'description',
                        'title' => 'FILD_DESCRIPTION_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_DESCRIPTION_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );

        //############################################ informações da coluna default ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'default',
                    'options' => array(
                        'label' => 'FILD_DEFAULT_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'default',
                        'title' => 'FILD_DEFAULT_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_DEFAULT_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );

        //############################################ informações da coluna auto_increment ##############################################:
        $this->add(array(
            'type' => 'Zend\Form\Element\Checkbox',
            'name' => 'auto_increment',
            'options' => array(
                'label' => 'FILD_AUTO_INCREMENT_LABEL',
                'use_hidden_element' => FALSE,
                'checked_value' => true,
                'unchecked_value' => false
            ),
            'attributes' => array(
                'value' => 'yes',
                'id' => 'auto_increment',
                'title' => 'FILD_AUTO_INCREMENT_DESC',
            )
        ));
    }

}
