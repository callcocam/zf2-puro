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
        $this->setInputFilter(new CreateTableFilter($serviceLocator));
        //############################################ informações da coluna title ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'title',
                    'options' => array(
                        'label' => 'FILD_TITLE_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'title',
                        'title' => 'FILD_TITLE_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_TITLE_PLACEHOLDER',
                        'data-access' => '3',
                        'readonly' => true,
                        'data-position' => 'geral',
                    ),
                )
        );

   }

}
