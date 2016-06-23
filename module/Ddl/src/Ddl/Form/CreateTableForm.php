<?php

namespace Ddl\Form;

/**
 * CreateTableForm [CreateTableForm]
 *
 * @copyright (c) year, Claudio Coelho
 */
class CreateTableForm extends \Zend\Form\Form {

    public function __construct($serviceLocator, $name = null, $options = array()) {
        parent::__construct('CreateTableForm', $options);
        //Não se esqueça de setar o inputFilter
        $this->setInputFilter(new TableFilter($serviceLocator));
        //############################################ informações da coluna title ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'tabela',
                    'options' => array(
                        'label' => 'FILD_TABELA_LABEL',
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
