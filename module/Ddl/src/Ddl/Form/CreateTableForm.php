<?php
namespace Ddl\Form;
/**
 * CreateTableForm [CreateTableForm]
 *
 * @copyright (c) year, Claudio Coelho
 */
class CreateTableForm extends \Base\Form\AbstractForm {

    public function __construct($serviceLocator, $name = null, $options = array()) {
        parent::__construct($serviceLocator, 'CreateTableForm', $options);
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

   }

}
