
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
        // Configurações iniciais do Form estou testando
        parent::__construct($serviceLocator, "BsClientes", $options);
        $this->setInputFilter(new  BsClientesFilter());
                    //############################################ informações da coluna imagesG ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'text',
        	                    'name' => 'imagesG',
        	                    'options' => array(
                     			'label' => 'FILD_IMAGESG_LABEL',
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'imagesG',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_IMAGESG_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'title'=>'images',
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
    }


}

