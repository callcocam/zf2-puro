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
        	                    'type' => 'text',
        	                    'name' => 'caixa_id',
        	                    'options' => array(
                     			'label' => 'FILD_CAIXA_ID_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'caixa_id',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_CAIXA_ID_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'caixa_id',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );
        
        
                    //############################################ informações da coluna situacao ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'situacao',
        	                    'options' => array(
                     			'label' => 'FILD_SITUACAO_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'situacao',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_SITUACAO_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'situacao',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );
        
        
                    //############################################ informações da coluna repete ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'repete',
        	                    'options' => array(
                     			'label' => 'FILD_REPETE_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'repete',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_REPETE_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'repete',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );
        
        
                    //############################################ informações da coluna perildo ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'perildo',
        	                    'options' => array(
                     			'label' => 'FILD_PERILDO_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'perildo',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_PERILDO_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'perildo',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );
        
        
                    //############################################ informações da coluna qtdade ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'qtdade',
        	                    'options' => array(
                     			'label' => 'FILD_QTDADE_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'qtdade',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_QTDADE_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'qtdade',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );
        
        
                    //############################################ informações da coluna conta_id ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'conta_id',
        	                    'options' => array(
                     			'label' => 'FILD_CONTA_ID_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'conta_id',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_CONTA_ID_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'conta_id',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );
        
        
                    //############################################ informações da coluna plano_conta_id ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'plano_conta_id',
        	                    'options' => array(
                     			'label' => 'FILD_PLANO_CONTA_ID_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'plano_conta_id',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_PLANO_CONTA_ID_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'plano_conta_id',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );
        
        
                    //############################################ informações da coluna centro_custo_id ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'centro_custo_id',
        	                    'options' => array(
                     			'label' => 'FILD_CENTRO_CUSTO_ID_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'centro_custo_id',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_CENTRO_CUSTO_ID_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'centro_custo_id',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );
        
        
                    //############################################ informações da coluna fornecedor_id ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'fornecedor_id',
        	                    'options' => array(
                     			'label' => 'FILD_FORNECEDOR_ID_LABEL',
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
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'fpgto_id',
        	                    'options' => array(
                     			'label' => 'FILD_FPGTO_ID_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'fpgto_id',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_FPGTO_ID_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'fpgto_id',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );
        
        
                    //############################################ informações da coluna tipo_custo ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'tipo_custo',
        	                    'options' => array(
                     			'label' => 'FILD_TIPO_CUSTO_LABEL',
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
        	                    'type' => 'text',
        	                    'name' => 'apropriacao_custo',
        	                    'options' => array(
                     			'label' => 'FILD_APROPRIACAO_CUSTO_LABEL',
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
    }


}