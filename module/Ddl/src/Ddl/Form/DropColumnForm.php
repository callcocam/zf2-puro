<?php

namespace Ddl\Form;

/**
 * ColumnForm [ColumnForm]
 *
 * @copyright (c) year, Claudio Coelho
 */
class DropColumnForm extends \Zend\Form\Form {

    public function __construct($serviceLocator, $name = null, $options = array()) {
        parent::__construct('DropColumnForm', $options);
        //Não se esqueça de setar o inputFilter
        $this->setInputFilter(new DropColumnFilter($serviceLocator));
        //$name, $length, $nullable = false, $default = null, array $options = array()
        //############################################ informações da coluna tabela ##############################################:
        $this->add(
                array(
                    'type' => 'select',
                    'name' => 'tabela',
                    'options' => array(
                        'label' => 'TABELA:',
                        'value_options' => $this->getTabelas($serviceLocator),
                        "disable_inarray_validator" => true,
                    ),
                    'attributes' => array(
                        'id' => 'tabela',
                        'title' => 'FILD_TABELA_DESC',
                        'class' => 'form-control select-tabela drop-column',
                        'placeholder' => 'FILD_TABELA_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );
        //############################################ informações da coluna title ##############################################:
        $this->add(
                array(
                    'type' => 'select',
                    'name' => 'colunms',
                    'options' => array(
                        'label' => 'COLUMNS:',
                        'value_options' => array('' => '--Selecione--'),
                        "disable_inarray_validator" => true,
                    ),
                    'attributes' => array(
                        'id' => 'colunas',
                        'title' => 'FILD_COLUMNS_DESC',
                        'class' => 'form-control input-sm',
                        'data-access' => '3',
                        'data-position' => 'geral',
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

    public function getTabelas($serviceLocator) {
        $table = $serviceLocator->get('Table');
        $tableNames[''] = '--Selecione--';
        if ($table->getTablenames()):
            foreach ($table->getTablenames() as $value):
                $tableNames[$value] = $value;
            endforeach;
        endif;
        return $tableNames;
    }

}
