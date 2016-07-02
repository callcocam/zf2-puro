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
class BsCaixaForm extends AbstractForm {

    /**
     * construct do Table
     *
     * @return Base\Form\AbstractForm
     */
    public function __construct($serviceLocator, array $options = array()) {
        // Configurações iniciais do Form
        parent::__construct($serviceLocator, "BsCaixa", $options);
        $this->setInputFilter(new BsCaixaFilter());
        $formatter = $serviceLocator->get('DateFormat');
        if ($this->has('title')):
            $this->get("title")->setValue($formatter->getDate())->setAttribute('readonly', true);
        endif;

        //############################################ informações da coluna ent_previsto ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'ent_previsto',
                    'options' => array(
                        'label' => 'FILD_ENT_PREVISTO_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'ent_previsto',
                        'class' => 'form-control real',
                        'placeholder' => 'FILD_ENT_PREVISTO_PLACEHOLDER',
                        'requerid' => '1',
                        'value' => '0',
                        'title' => 'ent_previsto',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna ent_real ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'ent_real',
                    'options' => array(
                        'label' => 'FILD_ENT_REAL_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'ent_real',
                        'class' => 'form-control real',
                        'placeholder' => 'FILD_ENT_REAL_PLACEHOLDER',
                        'requerid' => '1',
                        'value' => '0',
                        'title' => 'ent_real',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna said_previsto ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'said_previsto',
                    'options' => array(
                        'label' => 'FILD_SAID_PREVISTO_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'said_previsto',
                        'class' => 'form-control real',
                        'value' => '0',
                        'placeholder' => 'FILD_SAID_PREVISTO_PLACEHOLDER',
                        'requerid' => '1',
                        'title' => 'said_previsto',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna said_real ##############################################:
        $this->add(
        array(
        'type' => 'text',
        'name' => 'said_real',
        'options' => array(
        'label' => 'FILD_SAID_REAL_LABEL',
        ),
        'attributes' => array(
        'id' => 'said_real',
        'class' => 'form-control real',
        'placeholder' => 'FILD_SAID_REAL_PLACEHOLDER',
        'requerid' => '1',
          'value' => '0',
        'title' => 'said_real',
        'data-access' => '3',
        'data-position' => 'geral',
        ),
        )
        );
    }

}
