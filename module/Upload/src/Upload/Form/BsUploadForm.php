<?php

namespace Upload\Form;

/**
 * BsUploadForm [BsUploadForm]
 *
 * @copyright (c) year, Claudio Coelho
 */
class BsUploadForm extends \Zend\Form\Form {

    public function __construct($name = null, $options = NULL) {
        parent::__construct('BsUploadForm', $options);
        $this->setAttribute('class', 'uploadFile');
        //############################################ informações da coluna id ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'id',
                    'attributes' => array(
                        'id' => 'id',
                        'value' => 'AUTOMATICO',
                    ),
                )
        );
        //############################################ informações da coluna codigo ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'codigo',
                    'attributes' => array(
                        'id' => 'codigo',
                        'value' => '0',
                    ),
                )
        );
        //############################################ informações da coluna asset_id ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'asset_id',
                    'attributes' => array(
                        'id' => 'asset_id',
                        'value' => '0',
                    ),
                )
        );


        //############################################ informações da coluna empresa ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'empresa',
                    'attributes' => array(
                        'id' => 'empresa',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna title ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'title',
                    'attributes' => array(
                        'id' => 'title',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );
         //############################################ informações da coluna size ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'size',
                    'attributes' => array(
                        'id' => 'size',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );
        
         //############################################ informações da coluna extension ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'extension',
                    'attributes' => array(
                        'id' => 'extension',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );
        
         //############################################ informações da coluna mimetype ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'mimetype',
                    'attributes' => array(
                        'id' => 'mimetype',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );
        //############################################ informações da coluna files ##############################################:
        $this->add(array(
            'name' => 'files',
            'attributes' => array(
                'type' => 'file',
            )
        ));
        //############################################ informações da coluna description ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'description',
                    'options' => array(
                        'label' => 'FILD_DESCRIPTION_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'description',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );

        //############################################ informações da coluna state ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'state',
                    'attributes' => array(
                        'id' => 'state',
                        'data-access' => '3',
                        'data-position' => 'geral',
                        'value' => '1'
                    ),
                )
        );


//############################################ informações da coluna access ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'access',
                    'attributes' => array(
                        'id' => 'access',
                        'value' => '0',
                    ),
                )
        );
        //############################################ informações da coluna created_by ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'created_by',
                    'attributes' => array(
                        'id' => 'created_by',
                        'value' => '0',
                    ),
                )
        );
        //############################################ informações da coluna alias ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'alias',
                    'attributes' => array(
                        'id' => 'alias',
                        'value' => '0',
                    ),
                )
        );

        //############################################ informações da coluna modified_by ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'modified_by',
                    'attributes' => array(
                        'id' => 'modified_by',
                        'value' => '0',
                    ),
                )
        );
        //############################################ informações da coluna ordering ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'ordering',
                    'attributes' => array(
                        'id' => 'ordering',
                        'value' => '0',
                    ),
                )
        );
        //############################################ informações da coluna created ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'created',
                    'attributes' => array(
                        'id' => 'created',
                        'value' => date("d-m-Y"),
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna modified ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'modified',
                    'attributes' => array(
                        'id' => 'modified',
                        'value' => date("d-m-Y H:i:s"),
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna publish_up ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'publish_up',
                    'attributes' => array(
                        'id' => 'publish_up',
                        'value' => date("d-m-Y H:i:s"),
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );

        //############################################ informações da coluna publish_down ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'publish_down',
                    'attributes' => array(
                        'id' => 'publish_down',
                        'value' => date("d-m-Y H:i:s"),
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );

        $this->add(array(
            'type' => 'Zend\Form\Element\Csrf',
            'name' => 'security',
            'options' => array(
                'csrf_options' => array(
                    'timeout' => 6000
                )
            ),
            'attributes' => array(
                'id' => 'security',
                'data-access' => '5',
                'data-position' => 'geral',
            )
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Upload Now',
                'id' => 'submit',
                'class' => 'btn btn-green',
                'data-access' => '5',
                'data-position' => 'geral',
            )
        ));
    }

}
