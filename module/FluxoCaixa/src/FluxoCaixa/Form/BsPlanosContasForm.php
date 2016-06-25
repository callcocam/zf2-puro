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
class BsPlanosContasForm extends AbstractForm
{

    /**
     * construct do Table
     *
     * @return Base\Form\AbstractForm
     */
    public function __construct($serviceLocator, array $options = array())
    {
        // Configurações iniciais do Form
        parent::__construct($serviceLocator, "BsPlanosContas", $options);
        $this->setInputFilter(new  BsPlanosContasFilter());
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
    }


}