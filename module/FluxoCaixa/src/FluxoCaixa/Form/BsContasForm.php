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
class BsContasForm extends AbstractForm {

    /**
     * construct do Table
     *
     * @return Base\Form\AbstractForm
     */
    public function __construct($serviceLocator, array $options = array()) {
        // Configurações iniciais do Form
        parent::__construct($serviceLocator, "BsContas", $options);
        $this->setInputFilter(new BsContasFilter());
       //############################################ informações da coluna conta_tipo ##############################################:
       $this->add(array(
            'type' => 'radio',
            'name' => 'conta_tipo',
            'options' => array(
                'label' => 'FILD_CONTA_TIPO_LABEL',
                'label_attributes' => array(
                    'class' => 'css-label',
                     'id'    =>'sliderLabel',
                ),
                'value_options' => array(
                    'negativa' => array(
                        'label' => 'BANCO',
                        'value' => '1',
                        'checked'=>true,
                        'attributes' => array(
                            'class' => 'css-checkbox',
                            'checked'=>'checked'
                           
                        ),
                    ),
                    'positiva' => array(
                        'label' => 'OUTRA',
                        'value' => '0',
                        'attributes' => array(
                            'class' => 'css-checkbox',
                        ),
                    ),
                ),
            ),
            'attributes' => array(
                'id' => 'conta_tipo',
                'requerid' => '1',
                'value'=>'1',
                'title' => 'Tipo de Conta',
                'data-access' => '3',
                'data-position' => 'geral',
                'class' => 'css-checkbox',
            )
        ));        
       //############################################ informações da coluna banco_id ##############################################:
        $this->add(
                array(
                    'type' => 'select',
                    'name' => 'banco_id',
                    'options' => array(
                        'label' => 'FILD_BANCO_ID_LABEL',
                        'value_options' => $this->setValueOption("FluxoCaixa\Model\BsBancosTable", array('state' => '0'))
                    ),
                    'attributes' => array(
                        'id' => 'banco_id',
                        'class' => 'form-control',
                        'placeholder' => 'FILD_BANCO_ID_PLACEHOLDER',
                        'requerid' => '1',
                        'title' => 'banco_id',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna tipo ##############################################:
        $this->add(
                array(
                    'type' => 'select',
                    'name' => 'tipo',
                    'options' => array(
                        'label' => 'FILD_TIPO_LABEL',
                        'value_options' => ['' => '--SELECIONE--', '1' => "Conta Corrente", '2' => 'Conta Poupança']
                    ),
                    'attributes' => array(
                        'id' => 'tipo',
                        'class' => 'form-control',
                        'placeholder' => 'FILD_TIPO_PLACEHOLDER',
                        'requerid' => '1',
                        'title' => 'tipo',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna agencia ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'agencia',
                    'options' => array(
                        'label' => 'FILD_AGENCIA_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'agencia',
                        'class' => 'form-control',
                        'placeholder' => 'FILD_AGENCIA_PLACEHOLDER',
                        'requerid' => '1',
                        'title' => 'agencia',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna conta ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'conta',
                    'options' => array(
                        'label' => 'FILD_CONTA_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'conta',
                        'class' => 'form-control',
                        'placeholder' => 'FILD_CONTA_PLACEHOLDER',
                        'requerid' => '1',
                        'title' => 'conta',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna gerente ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'gerente',
                    'options' => array(
                        'label' => 'FILD_GERENTE_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'gerente',
                        'class' => 'form-control',
                        'placeholder' => 'FILD_GERENTE_PLACEHOLDER',
                        'requerid' => '1',
                        'title' => 'gerente',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna phone ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'phone',
                    'options' => array(
                        'label' => 'FILD_PHONE_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'phone',
                        'class' => 'form-control',
                        'placeholder' => 'FILD_PHONE_PLACEHOLDER',
                        'requerid' => '1',
                        'title' => 'phone',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna saldo ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'saldo',
                    'options' => array(
                        'label' => 'FILD_SALDO_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'saldo',
                        'class' => 'form-control real',
                        'placeholder' => 'FILD_SALDO_PLACEHOLDER',
                        'requerid' => '1',
                        'title' => 'saldo',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna situacao ##############################################:
        
        $this->add(array(
            'type' => 'radio',
            'name' => 'situacao',
            'options' => array(
                'label' => 'FILD_SITUACAO_LABEL',
                'label_attributes' => array(
                    'class' => 'css-label',
                     'id'    =>'sliderLabel',
                ),
                'value_options' => array(
                    'negativa' => array(
                        'label' => 'NEGATIVA',
                        'value' => '0',
                        'checked'=>true,
                        'attributes' => array(
                            'class' => 'css-checkbox negativa',
                            'checked'=>'checked'
                           
                        ),
                    ),
                    'positiva' => array(
                        'label' => 'POSITIVA',
                        'value' => '1',
                        'attributes' => array(
                            'class' => 'css-checkbox positiva',
                        ),
                    ),
                ),
            ),
            'attributes' => array(
                'id' => 'situacao',
                'requerid' => '1',
                'value'=>'1',
                'title' => 'situacao',
                'data-access' => '3',
                'data-position' => 'geral',
                'class' => 'css-checkbox',
            )
        ));


    }

}
