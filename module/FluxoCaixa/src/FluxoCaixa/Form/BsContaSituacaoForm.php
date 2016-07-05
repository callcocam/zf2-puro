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
class BsContaSituacaoForm extends AbstractForm
{

    /**
     * construct do Table
     *
     * @return Base\Form\AbstractForm
     */
    public function __construct($serviceLocator, array $options = array())
    {
        // Configurações iniciais do Form
        parent::__construct($serviceLocator, "BsContaSituacao", $options);
        $this->setInputFilter(new  BsContaSituacaoFilter());
                    //############################################ informações da coluna tipo ##############################################:
        		    $this->add(
        	                array(
        	                    'type' => 'select',
        	                    'name' => 'tipo',
        	                    'options' => array(
                     			'label' => 'FILD_TIPO_LABEL',
                     			'value_options'=>['ET'=>'DAS RECEITAS','DS'=>'DAS DESPESAS']
                     		   	 ),
        	                    'attributes' => array(
                                        'id'=>'tipo',
                                        'class'=>'form-control',
                                        'placeholder'=>'FILD_TIPO_PLACEHOLDER',
                                        'requerid'=>'1',
                                        'value'=>'ET',
                                        'title'=>'tipo',
                                        'data-access'=>'3',
                                        'data-position'=>'geral',
            	        	        ),
        	                )
        	            );
    }


}