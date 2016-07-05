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
class BsMovimentoForm extends AbstractForm {

    /**
     * construct do Table
     *
     * @return Base\Form\AbstractForm
     */
    public function __construct($serviceLocator, array $options = array()) {
        // Configurações iniciais do Form
        parent::__construct($serviceLocator, "BsMovimento", $options);
        $this->setInputFilter(new BsMovimentoFilter());
        //############################################ informações da coluna caixa_id ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'caixa_id',
                    'options' => array(
                        'label' => 'FILD_CAIXA_ID_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'caixa_id',
                        'requerid' => '1',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );

        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'state',
                    'attributes' => array(
                        'id' => 'state',
                        'requerid' => '1',
                        'data-access' => '3',
                        'value' => '0',
                        'data-position' => 'geral',
                    ),
                )
        );
        if ($this->has('caixa_id')):
            $this->get('caixa_id')->setValue($this->getCaixa());
        endif;
    }

}
