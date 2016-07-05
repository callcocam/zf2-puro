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
class BsContasPagarForm extends AbstractForm
{

    /**
     * construct do Table
     *
     * @return Base\Form\AbstractForm
     */
    public function __construct($serviceLocator, array $options = array())
    {
        // Configurações iniciais do Form
        parent::__construct($serviceLocator, "BsContasPagar", $options);
        $this->setInputFilter(new  BsContasPagarFilter());
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
                        'placeholder' => '0,00',
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
                'value_options' =>  $this->setCustonValueOption('FluxoCaixa\Model\BsContaSituacaoTable','id','title',array('tipo'=>'DS')),
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
                'value_options' => $this->setCustonValueOption('FluxoCaixa\Model\BsContaRepeteTable','alias','title'),
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



        //############################################ informações da coluna periodos ##############################################:
        $this->add(
                array(
                    'type' => 'select',
                    'name' => 'periodos',
                    'options' => array(
                        'label' => 'FILD_PERIODOS_LABEL',
                        'value_options'=> $this->setCustonValueOption('FluxoCaixa\Model\BsContaPeriodosTable','id','title'),
                    ),
                    'attributes' => array(
                        'id' => 'periodos',
                        'class' => 'form-control',
                        'placeholder' => 'FILD_PERIODOS_PLACEHOLDER',
                        'requerid' => '1',
                        'title' => 'periodos',
                        'value'=>'+1 month',
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
                          'value_options'=>$this->setValueOpt("FluxoCaixa\Model\BsPlanosContasTable",array('state' => '0', 'parent_id' => '','tipo'=>'1')),
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



                    //############################################ informações da coluna fornecedor_id ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'select',
        	                    'name' => 'fornecedor_id',
        	                    'options' => array(
                     			'label' => 'FILD_FORNECEDOR_ID_LABEL',
                     			  'value_options'=>[]
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'fornecedor_id',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_FORNECEDOR_ID_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'fornecedor_id',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );


                    //############################################ informações da coluna fpgto_id ##############################################:
        		
        //############################################ informações da coluna fpgto_id ##############################################:
        $this->add(
                array(
                    'type' => 'select',
                    'name' => 'fpgto_id',
                    'options' => array(
                        'label' => 'FILD_FPGTO_ID_LABEL',
                        'value_options'=>[]
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




                    //############################################ informações da coluna tipo_custo ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'select',
        	                    'name' => 'tipo_custo',
        	                    'options' => array(
                     			'label' => 'FILD_TIPO_CUSTO_LABEL',
                     			'value_options'=>$this->setValueOption('FluxoCaixa\Model\BsTipoCustoTable'),
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'tipo_custo',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_TIPO_CUSTO_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'tipo_custo',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );


                    //############################################ informações da coluna apropriacao_custo ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'select',
        	                    'name' => 'apropriacao_custo',
        	                    'options' => array(
                     			'label' => 'FILD_APROPRIACAO_CUSTO_LABEL',
                     			'value_options'=>$this->setValueOption('FluxoCaixa\Model\BsApropriacaoCustoTable'),
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'apropriacao_custo',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_APROPRIACAO_CUSTO_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'apropriacao_custo',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
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
                     			  'value_options'=>$this->setValueOption('FluxoCaixa\Model\BsTipoDocumentoTable'),
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
                                        'id'=>'num_documento',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_NUM_DOCUMENTO_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'num_documento',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
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