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
class BsPlanosContasForm extends AbstractForm {

    /**
     * construct do Table
     *
     * @return Base\Form\AbstractForm
     */
    public function __construct($serviceLocator, array $options = array()) {
        // Configurações iniciais do Form
        parent::__construct($serviceLocator, "BsPlanosContas", $options);
        $this->setInputFilter(new BsPlanosContasFilter());
        //############################################ informações da coluna tipo ##############################################:
        $this->add(
                array(
                    'type' => 'select',
                    'name' => 'tipo',
                    'options' => array(
                        'label' => 'FILD_TIPO_LABEL',
                        'value_options' => array('' => '---SELECIONE---', '1' => 'RECEITAS', '2' => 'DESPESAS')
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


        //############################################ informações da coluna parent_id ##############################################:
        $this->add(
                array(
                    'type' => 'Select',
                    'name' => 'parent_id',
                    'options' => array(
                        'label' => 'FILD_PARENT_ID_LABEL',
                        'value_options' => array('' => '---SELECIONE---',
                            '1' => array(
                                'label' => 'RECEITAS',
                                'options' => array(
                                    '1' => 'RECEITAS COM PRODUTOS',
                                    '2' => 'RECEITAS COM SERVIÇOS',
                                    '3' => 'RECEITAS NÃO OPERACIONAIS',
                                ),
                            ),
                            '2' => array(
                                'label' => 'DESPESAS',
                                'options' => array(
                                    '4' => 'DESPESAS COM PRODUTOS',
                                    '5' => 'DESPESAS COM SERVIÇOS',
                                    '6' => 'DESPESAS NÃO OPERACIONAIS',
                                    '7' => 'DESPESAS COM RH',
                                    '8' => 'DESPESAS OPERACIONAIS',
                                    '9' => 'DESPESAS DE MARKETING',
                                ),
                            ),
                            '3' => array(
                                'label' => 'OUTROS',
                                'options' => array(
                                    '10' => 'IMPOSTOS',
                                    '11' => 'INVESTIMENTOS'
                                ),
                            ),
                        )
                    ),
                    'attributes' => array(
                        'id' => 'parent_id',
                        'class' => 'form-control',
                        'placeholder' => 'FILD_PARENT_ID_PLACEHOLDER',
                        'requerid' => '1',
                        'title' => 'parent_id',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );

        
    }
    
     public function setValueOptions() {
        $table = $this->getServiceLocator()->get("FluxoCaixa\Model\BsPlanosContasTable");
        $dados = $table->findBy(array('state' => '0', 'parent_id' => ''));
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
