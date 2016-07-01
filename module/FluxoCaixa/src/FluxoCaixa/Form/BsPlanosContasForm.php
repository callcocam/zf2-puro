<?php

/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */

namespace FluxoCaixa\Form;

use Base\Form\AbstractForm;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class BsPlanosContasForm extends AbstractForm {

    /**
     * construct do Table
     *
     * @return Base\Form\AbstractForm
     */
    public function __construct($serviceLocator, array $options = array()) {
        // Configurações iniciais do Form
        parent::__construct($serviceLocator, "BsPlanosContas", $options);
        $this->setInputFilter(new BsPlanosContasFilter());
        //############################################ informações da coluna parent_id ##############################################:

        $this->add(
                array(
                    'type' => 'Select',
                    'name' => 'parent_id',
                    'options' => array(
                        'label' => 'FILD_PARENT_ID_LABEL',
                        'value_options' => $this->setValueOption("FluxoCaixa\Model\BsPlanosContasTable", array('state' => '0', 'parent_id' => ''))
                    ),
                    'attributes' => array(
                        'id' => 'parent_id',
                        'class' => 'form-control',
                        'placeholder' => 'FILD_PARENT_ID_PLACEHOLDER',
                        'requerid' => '0',
                        'title' => 'parent_id',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );
    }

}
