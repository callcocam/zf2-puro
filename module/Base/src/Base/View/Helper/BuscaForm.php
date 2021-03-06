<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SGBase\Form;

use Doctrine\ORM\EntityManager;
use Zend\Form\Form;
/**
 * Description of BuscaForm
 *
 * @author Call
 */
class BuscaForm extends Form {

    /**
     * Initialize  elements
     */
    public function __construct(EntityManager $objectManager) {
        // Configurações iniciais do Form
        parent::__construct("BuscaForm");
        $this->setAttribute("method", "post");
        $this->setAttribute("class", "navbar-form navbar-right");
        $this->setAttribute("role", "search");



        // informações da coluna state:
        $this->add(
                array(
                    'type' => 'Select',
                    'name' => 'state',
                    'options' => array(
                       'value_options'=>array('0'=>'Publicado','1'=>'Arquivado')
                    ),
                    'attributes' => array(
                        'id' => 'state',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_STATE_PLACEHOLDER',
                        'title' => 'FILD_STATE_DESC',
                    ),
                )
        );

        // informações da coluna publish_up:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'created',
                    'options' => array(
                        'label' => '- : -',
                    ),
                    'attributes' => array(
                        'id' => 'created',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_PUBLISH_UP_PLACEHOLDER',
                        'title' => 'FILD_PUBLISH_UP_DESC',
                    ),
                )
        );

        // informações da coluna publish_down:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'publish_down',
                    'options' => array(
                        'label' => '- : -',
                    ),
                    'attributes' => array(
                        'id' => 'publish_down',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_PUBLISH_DOWN_PLACEHOLDER',
                        'title' => 'FILD_PUBLISH_DOWN_DESC',
                    ),
                )
        );

        // informações da coluna title:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'busca',
                    'options' => array(
                        'label' => '- : -',
                    ),
                    'attributes' => array(
                        'id' => 'busca',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_BUSCA_PLACEHOLDER',
                        'title' => 'FILD_BUSCA_DESC',
                    ),
                )
        );
        
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'BUSCAR',
                'id' => 'submit',
                'class' => 'btn btn-default'
            ),
        ));
    }

}
