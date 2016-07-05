<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Admin\Form;

use Base\Form\AbstractForm;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class BsClientesForm extends AbstractForm
{

    /**
     * construct do Table
     *
     * @return Base\Form\AbstractForm
     */
    public function __construct($serviceLocator, array $options = array())
    {
        // Configurações iniciais do Form
        parent::__construct($serviceLocator, "BsClientes", $options);
        $this->setInputFilter(new  BsClientesFilter());
                    //############################################ informações da coluna email ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'email',
        	                    'options' => array(
                     			'label' => 'FILD_EMAIL_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'email',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_EMAIL_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'email',
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


                    //############################################ informações da coluna cnpj ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'cnpj',
        	                    'options' => array(
                     			'label' => 'FILD_CNPJ_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'cnpj',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_CNPJ_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'cnpj',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
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
                                        'id'=>'phone',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_PHONE_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'phone',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );


                    //############################################ informações da coluna whatsapp ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'whatsapp',
        	                    'options' => array(
                     			'label' => 'FILD_WHATSAPP_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'whatsapp',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_WHATSAPP_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'whatsapp',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );


                    //############################################ informações da coluna rg ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'rg',
        	                    'options' => array(
                     			'label' => 'FILD_RG_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'rg',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_RG_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'rg',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );


                    //############################################ informações da coluna ie ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'ie',
        	                    'options' => array(
                     			'label' => 'FILD_IE_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'ie',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_IE_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'ie',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );


                    //############################################ informações da coluna cidade ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'cidade',
        	                    'options' => array(
                     			'label' => 'FILD_CIDADE_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'cidade',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_CIDADE_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'cidade',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );


                    //############################################ informações da coluna bairro ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'bairro',
        	                    'options' => array(
                     			'label' => 'FILD_BAIRRO_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'bairro',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_BAIRRO_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'bairro',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );


                    //############################################ informações da coluna endereco ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'endereco',
        	                    'options' => array(
                     			'label' => 'FILD_ENDERECO_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'endereco',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_ENDERECO_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'endereco',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );


                    //############################################ informações da coluna credito ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'credito',
        	                    'options' => array(
                     			'label' => 'FILD_CREDITO_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'credito',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_CREDITO_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'credito',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );


                    //############################################ informações da coluna cep ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'cep',
        	                    'options' => array(
                     			'label' => 'CEP',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'cep',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_CEP_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'cep',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );


                    //############################################ informações da coluna facebook ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'facebook',
        	                    'options' => array(
                     			'label' => 'FILD_FACEBOOK_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'facebook',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_FACEBOOK_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'facebook',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );


                    //############################################ informações da coluna twitter ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'twitter',
        	                    'options' => array(
                     			'label' => 'FILD_TWITTER_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'twitter',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_TWITTER_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'twitter',
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
    }


}