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
        
    }

}
