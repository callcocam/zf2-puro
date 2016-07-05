<?php

namespace Operacional\Form;

/**
 * BsGruposForm [BsGruposForm]
 *
 * @copyright (c) year, Claudio Coelho
 */
class BsGruposForm extends \Base\Form\AbstractForm {

    public function __construct($serviceLocator, $name = null, $options = array()) {
        parent::__construct($serviceLocator, 'BsGruposForm', $options);
        //Não se esqueça de setar o inputFilter
        $this->setInputFilter(new BsGruposFilter($serviceLocator));
        //############################################ informações da coluna icone ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'icone',
                    'options' => array(
                        'label' => 'FILD_ICONE_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'icone',
                        'title' => 'FILD_ICONE_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_ICONE_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'geral',
                        'value' => 'ion'
                    ),
                )
        );
    }

}
