<?php

namespace Ddl\Form;

/**
 * CreateTableForm [CreateTableForm]
 *
 * @copyright (c) year, Claudio Coelho
 */
class DropTableForm extends \Zend\Form\Form {

    public function __construct($serviceLocator, $name = null, $options = array()) {
        parent::__construct('DropTableForm', $options);
        //Não se esqueça de setar o inputFilter
        $this->setInputFilter(new TableFilter($serviceLocator));
        //############################################ informações da coluna tabela ##############################################:
        $this->add(
                array(
                    'type' => 'select',
                    'name' => 'tabela',
                    'options' => array(
                        'label' => 'TABELA',
                        'value_options' => $this->getTabelas($serviceLocator),
                        "disable_inarray_validator" => true,
                    ),
                    'attributes' => array(
                        'id' => 'tabela',
                        'title' => 'TABELA_DESC',
                        'class' => 'form-control input-sm drop-table',
                        'placeholder' => 'TABELA_PLACEHOLDER',
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
