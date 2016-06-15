<?php
namespace Ddl\Form;
/**
 * CreateTableForm [CreateTableForm]
 *
 * @copyright (c) year, Claudio Coelho
 */
class DropTableForm extends \Base\Form\AbstractForm {

    public function __construct($serviceLocator, $name = null, $options = array()) {
        parent::__construct($serviceLocator, 'DropTableForm', $options);
        //Não se esqueça de setar o inputFilter
        $this->setInputFilter(new TableFilter($serviceLocator));
          //############################################ informações da coluna tabela ##############################################:
        $this->add(
                array(
                    'type' => 'select',
                    'name' => 'tabela',
                    'options' => array(
                        'label' => 'TABELA',
                        'value_options' => $this->getTabelas(),
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
       

   }

}
