<?php

namespace Operacional\Form;

/**
 * BsGruposForm [BsGruposForm]
 *
 * @copyright (c) year, Claudio Coelho
 */
class BsTradutorForm extends \Base\Form\AbstractForm {

    public function __construct($serviceLocator, $name = null, $options = array()) {
        parent::__construct($serviceLocator, 'BsTradutorForm', $options);
        //Não se esqueça de setar o inputFilter
        $this->setInputFilter(new BsTradutorFilter($serviceLocator));

        //############################################ informações da coluna placeholder ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'placeholder',
                    'options' => array(
                        'label' => 'FILD_PLACEHOLDER_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'placeholder',
                        'title' => 'FILD_PLACEHOLDER_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_PLACEHOLDER_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'geral'
                    ),
                )
        );
        //############################################ informações da coluna dica_tela ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'dica_tela',
                    'options' => array(
                        'label' => 'FILD_DICA_TELA_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'dica_tela',
                        'title' => 'FILD_DICA_TELA_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_DICA_TELA_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'geral'
                    ),
                )
        );
    }

}
