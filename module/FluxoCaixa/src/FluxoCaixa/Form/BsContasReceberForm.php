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
class BsContasReceberForm extends AbstractForm {

    /**
     * construct do Table
     *
     * @return Base\Form\AbstractForm
     */
    public function __construct($serviceLocator, array $options = array()) {
        // Configurações iniciais do Form
        parent::__construct($serviceLocator, "BsContasReceber", $options);
        $this->setInputFilter(new BsContasReceberFilter());
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
                        'class' => 'form-control',
                        'placeholder' => 'FILD_CAIXA_ID_PLACEHOLDER',
                        'requerid' => '1',
                        'title' => 'caixa_id',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


//############################################ informações da coluna valor ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'valor',
                    'options' => array(
                        'label' => 'FILD_VALOR_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'valor',
                        'class' => 'form-control real',
                        'placeholder' => 'FILD_VALOR_PLACEHOLDER',
                        'requerid' => '1',
                        'title' => 'valor',
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
                    'class' => 'css-label ',
                    'id' => 'sliderLabel',
                ),
                'value_options' => array(
                    'negativa' => array(
                        'label' => 'RECEBIDA',
                        'value' => '0',
                        'checked' => true,
                        
                    ),
                    'positiva' => array(
                        'label' => 'RECEBER',
                        'value' => '1',
                      
                    ),
                ),
            ),
            'attributes' => array(
                'id' => 'situacao',
                'requerid' => '1',
                'value' => '1',
                'title' => 'situacao',
                'data-access' => '3',
                'data-position' => 'geral',
                'class' => 'css-checkbox situacao',
            )
        ));

        //############################################ informações da coluna repete ##############################################:
        $this->add(array(
            'type' => 'radio',
            'name' => 'repete',
            'options' => array(
                'label' => 'FILD_REPETE_LABEL',
                'label_attributes' => array(
                    'class' => 'css-label',
                    'id' => 'sliderLabel',
                ),
                'value_options' => array(
                    'nao-repete' => array(
                        'label' => 'NÃO REPETE',
                        'value' => '0',
                        
                    ),
                    'mais-de-uma-vez' => array(
                        'label' => 'MAIS DE UMA VEZ',
                        'value' => '1',
                        
                    ),
                    'sempre' => array(
                        'label' => 'SEMPRE',
                        'value' => '2',
                       
                    ),
                ),
            ),
            'attributes' => array(
                'id' => 'repete',
                'requerid' => '1',
                'value' => '0',
                'title' => 'situacao',
                'data-access' => '3',
                'data-position' => 'geral',
                'class' => 'css-checkbox  repete',
            )
        ));



        //############################################ informações da coluna perildo ##############################################:
        $this->add(
                array(
                    'type' => 'select',
                    'name' => 'perildo',
                    'options' => array(
                        'label' => 'FILD_PERILDO_LABEL',
                        'value_options'=>array(''=>'--SELECIONE','diario'=>'Diario','semanal'=>'Semanal','mensal'=>'Mensal','trimestral'=>'Trimestral','anual'=>'Anual'),
                    ),
                    'attributes' => array(
                        'id' => 'perildo',
                        'class' => 'form-control',
                        'placeholder' => 'FILD_PERILDO_PLACEHOLDER',
                        'requerid' => '1',
                        'title' => 'perildo',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna qtdade ##############################################:
        $this->add(
                array(
                    'type' => 'Number',
                    'name' => 'qtdade',
                    'options' => array(
                        'label' => 'FILD_QTDADE_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'qtdade',
                        'class' => 'form-control',
                        'placeholder' => 'FILD_QTDADE_PLACEHOLDER',
                        'requerid' => '1',
                        'value'=>'1',
                        'title' => 'qtdade',
                        'data-access' => '3',
                        'data-position' => 'geral',
                         'min' => '1',
                        'max' => '12',
                        'step' => '1', // default step interval is 1
                    ),
                )
        );


        //############################################ informações da coluna conta_id ##############################################:
        $this->add(
                array(
                    'type' => 'select',
                    'name' => 'conta_id',
                    'options' => array(
                        'label' => 'FILD_CONTA_ID_LABEL',
                        'value_options'=>$this->setValueOption('FluxoCaixa\Model\BsContasTable'),
                    ),
                    'attributes' => array(
                        'id' => 'conta_id',
                        'class' => 'form-control',
                        'placeholder' => 'FILD_CONTA_ID_PLACEHOLDER',
                        'requerid' => '1',
                        'title' => 'conta_id',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna plano_conta_id ##############################################:
        $this->add(
                array(
                    'type' => 'select',
                    'name' => 'plano_conta_id',
                    'options' => array(
                        'label' => 'FILD_PLANO_CONTA_ID_LABEL',
                          'value_options'=>$this->setValueOpt("FluxoCaixa\Model\BsPlanosContasTable",array('state' => '0', 'parent_id' => '','tipo'=>'0')),
                    ),
                    'attributes' => array(
                        'id' => 'plano_conta_id',
                        'class' => 'form-control',
                        'placeholder' => 'FILD_PLANO_CONTA_ID_PLACEHOLDER',
                        'requerid' => '1',
                        'title' => 'plano_conta_id',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna centro_custo_id ##############################################:
        $this->add(
                array(
                    'type' => 'select',
                    'name' => 'centro_custo_id',
                    'options' => array(
                        'label' => 'FILD_CENTRO_CUSTO_ID_LABEL',
                         'value_options'=>$this->setValueOpt("FluxoCaixa\Model\BsCentroCustoTable",array('state' => '0', 'parent_id' => '')),
                    ),
                    'attributes' => array(
                        'id' => 'centro_custo_id',
                        'class' => 'form-control',
                        'placeholder' => 'FILD_CENTRO_CUSTO_ID_PLACEHOLDER',
                        'requerid' => '1',
                        'title' => 'centro_custo_id',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna cliente_id ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'cliente_id',
                    'options' => array(
                        'label' => 'FILD_CLIENTE_ID_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'cliente_id',
                        'class' => 'form-control',
                        'placeholder' => 'FILD_CLIENTE_ID_PLACEHOLDER',
                        'requerid' => '1',
                        'title' => 'cliente_id',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna fpgto_id ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'fpgto_id',
                    'options' => array(
                        'label' => 'FILD_FPGTO_ID_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'fpgto_id',
                        'class' => 'form-control',
                        'placeholder' => 'FILD_FPGTO_ID_PLACEHOLDER',
                        'requerid' => '1',
                        'title' => 'fpgto_id',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna tipo_documento ##############################################:
        
        $this->add(
        	                array(
        	                    'type' => 'select',
        	                    'name' => 'tipo_documento',
        	                    'options' => array(
                     			'label' => 'FILD_TIPO_DOCUMENTO_LABEL',
                     			'value_options'=>$this->setValueOption('FluxoCaixa\Model\BsTipoDocumentoTable')
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'tipo_documento',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_TIPO_DOCUMENTO_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'tipo_documento',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );
        	            
       //############################################ informações da coluna num_documento ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'num_documento',
                    'options' => array(
                        'label' => 'FILD_NUM_DOCUMENTO_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'num_documento',
                        'class' => 'form-control',
                        'placeholder' => 'FILD_NUM_DOCUMENTO_PLACEHOLDER',
                        'requerid' => '1',
                        'title' => 'num_documento',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );
        
        if ($this->has('caixa_id')):
            $this->get('caixa_id')->setValue($this->getCaixa());
        endif;
    }
    public function setValueOpt($tabela,$condicao=array('state'=>'0')) {
        $table = $this->getServiceLocator()->get($tabela);
        $dados = $table->findBy($condicao);
        $valueOptions = array('' => '--CATEGORIA PAI--');
        if ($dados):
            foreach ($dados as $value):
                $subCategoria = $table->findBy(array('state' => '0', 'parent_id' => $value->getId()));
                $valueOptionsSubCat = array();
                if ($subCategoria):
                    foreach ($subCategoria as $subCat) {
                        $valueOptionsSubCat[$subCat->getId()] ="--{$subCat->getTitle()}";
                    }
                endif;
                $valueOptions[$value->getId()] = array("label" => $value->getTitle(), "options" => $valueOptionsSubCat);
            endforeach;
        endif;
        return $valueOptions;
    }

}