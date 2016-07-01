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
class BsFornecedoresForm extends AbstractForm
{

    /**
     * construct do Table
     *
     * @return Base\Form\AbstractForm
     */
    public function __construct($serviceLocator, array $options = array())
    {
        // Configurações iniciais do Form
        parent::__construct($serviceLocator, "BsFornecedores", $options);
        $this->setInputFilter(new  BsFornecedoresFilter());
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


                    //############################################ informações da coluna site ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'site',
        	                    'options' => array(
                     			'label' => 'FILD_SITE_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'site',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_SITE_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'site',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );


                    //############################################ informações da coluna representante ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'representante',
        	                    'options' => array(
                     			'label' => 'FILD_REPRESENTANTE_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'representante',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_REPRESENTANTE_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'representante',
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
    }


}