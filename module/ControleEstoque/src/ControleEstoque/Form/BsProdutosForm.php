<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace ControleEstoque\Form;

use Base\Form\AbstractForm;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class BsProdutosForm extends AbstractForm
{

    /**
     * construct do Table
     *
     * @return Base\Form\AbstractForm
     */
    public function __construct($serviceLocator, array $options = array())
    {
        // Configurações iniciais do Form
        parent::__construct($serviceLocator, "BsProdutos", $options);
        $this->setInputFilter(new  BsProdutosFilter());
                    //############################################ informações da coluna barra ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'barra',
        	                    'options' => array(
                     			'label' => 'FILD_BARRA_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'barra',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_BARRA_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'barra',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );
        
        
                    //############################################ informações da coluna tipo ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'tipo',
        	                    'options' => array(
                     			'label' => 'FILD_TIPO_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'tipo',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_TIPO_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'tipo',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );
        
        
                    //############################################ informações da coluna subtitle ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'subtitle',
        	                    'options' => array(
                     			'label' => 'FILD_SUBTITLE_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'subtitle',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_SUBTITLE_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'subtitle',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );
        
        
                    //############################################ informações da coluna cat_id ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'cat_id',
        	                    'options' => array(
                     			'label' => 'FILD_CAT_ID_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'cat_id',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_CAT_ID_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'cat_id',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );
        
        
                    //############################################ informações da coluna marca_id ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'marca_id',
        	                    'options' => array(
                     			'label' => 'FILD_MARCA_ID_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'marca_id',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_MARCA_ID_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'marca_id',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );
        
        
                    //############################################ informações da coluna clfiscal ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'clfiscal',
        	                    'options' => array(
                     			'label' => 'FILD_CLFISCAL_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'clfiscal',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_CLFISCAL_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'clfiscal',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );
        
        
                    //############################################ informações da coluna ecfop ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'ecfop',
        	                    'options' => array(
                     			'label' => 'FILD_ECFOP_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'ecfop',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_ECFOP_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'ecfop',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );
        
        
                    //############################################ informações da coluna scfop ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'scfop',
        	                    'options' => array(
                     			'label' => 'FILD_SCFOP_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'scfop',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_SCFOP_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'scfop',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );
        
        
                    //############################################ informações da coluna cst ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'cst',
        	                    'options' => array(
                     			'label' => 'FILD_CST_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'cst',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_CST_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'cst',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );
        
        
                    //############################################ informações da coluna unidade_trib ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'unidade_trib',
        	                    'options' => array(
                     			'label' => 'FILD_UNIDADE_TRIB_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'unidade_trib',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_UNIDADE_TRIB_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'unidade_trib',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );
        
        
                    //############################################ informações da coluna pago ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'pago',
        	                    'options' => array(
                     			'label' => 'FILD_PAGO_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'pago',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_PAGO_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'pago',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );
        
        
                    //############################################ informações da coluna marge_lucro ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'marge_lucro',
        	                    'options' => array(
                     			'label' => 'FILD_MARGE_LUCRO_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'marge_lucro',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_MARGE_LUCRO_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'marge_lucro',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
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
                                        'id'=>'valor',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_VALOR_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'valor',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );
        
        
                    //############################################ informações da coluna estoque ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'estoque',
        	                    'options' => array(
                     			'label' => 'FILD_ESTOQUE_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'estoque',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_ESTOQUE_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'estoque',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );
        
        
                    //############################################ informações da coluna estoque_minimo ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'estoque_minimo',
        	                    'options' => array(
                     			'label' => 'FILD_ESTOQUE_MINIMO_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'estoque_minimo',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_ESTOQUE_MINIMO_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'estoque_minimo',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );
        
        
                    //############################################ informações da coluna images ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'images',
        	                    'options' => array(
                     			'label' => 'FILD_IMAGES_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'images',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_IMAGES_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'images',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );
        
        
                    //############################################ informações da coluna dim_width ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'dim_width',
        	                    'options' => array(
                     			'label' => 'FILD_DIM_WIDTH_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'dim_width',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_DIM_WIDTH_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'dim_width',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );
        
        
                    //############################################ informações da coluna dim_heigth ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'dim_heigth',
        	                    'options' => array(
                     			'label' => 'FILD_DIM_HEIGTH_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'dim_heigth',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_DIM_HEIGTH_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'dim_heigth',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );
        
        
                    //############################################ informações da coluna dim_depth ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'dim_depth',
        	                    'options' => array(
                     			'label' => 'FILD_DIM_DEPTH_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'dim_depth',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_DIM_DEPTH_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'dim_depth',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );
        
        
                    //############################################ informações da coluna dim_weight ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'dim_weight',
        	                    'options' => array(
                     			'label' => 'FILD_DIM_WEIGHT_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'dim_weight',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_DIM_WEIGHT_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'dim_weight',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );
    }


}

