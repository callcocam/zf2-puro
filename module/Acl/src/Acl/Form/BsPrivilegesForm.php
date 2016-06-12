<?php

namespace Acl\Form;

/**
 * BsPrivilegesForm [BsPrivilegesForm]
 *
 * @copyright (c) year, Claudio Coelho
 */
class BsPrivilegesForm extends \Base\Form\AbstractForm {

    public function __construct($serviceLocator, $name = null, $options = array()) {
        parent::__construct($serviceLocator,'BsPrivilegesForm', $options);
        //Não se esqueça de setar o inputFilter
        $this->setInputFilter(new BsPrivilegesFilter($serviceLocator));
        
        //############################################ informações da coluna id ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'id',
                    'options' => array(
                        'label' => 'FILD_ID_LABEL',
                    ),
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
                    'options' => array(
                        'label' => 'FILD_CODIGO_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'codigo',
                        'value' => '{codigo}',
                    ),
                )
        );


        //############################################ informações da coluna asset_id ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'asset_id',
                    'options' => array(
                        'label' => 'FILD_ASSET_ID_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'asset_id',
                        'value' => 'aeab2f6de9fd7dfc9d3623ca09b6482d',
                    ),
                )
        );


        //############################################ informações da coluna empresa ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'empresa',
                    'options' => array(
                        'label' => 'FILD_EMPRESA_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'empresa',
                        'value' => $this->authservice['empresa'],
                    ),
                )
        );


        //############################################ informações da coluna title ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'title',
                    'options' => array(
                        'label' => 'FILD_TITLE_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'title',
                        'title' => 'FILD_TITLE_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_TITLE_PLACEHOLDER',
                        'data-access' => '3',
                         'data-position' => 'geral',
                    ),
                )
        );
        
          //############################################ informações da coluna role_id ##############################################:
        $this->add(
                array(
                    'type' => 'select',
                    'name' => 'role_id',
                    'options' => array(
                        'label' => 'FILD_ROLE_ID_LABEL',
                        'value_options' => $this->getRoles(),
                        "disable_inarray_validator" => true,
                    ),
                    'attributes' => array(
                        'id' => 'role_id',
                        'title' => 'FILD_ROLE_ID_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_ROLE_ID_PLACEHOLDER',
                        'data-access' => '3',
                        'value'=>$this->authservice['role_id'],
                        'data-position' => 'geral',
                    ),
                )
        );
        
        //############################################ informações da coluna resources_id ##############################################:
        $this->add(
                array(
                    'type' => 'select',
                    'name' => 'resources_id',
                    'options' => array(
                        'label' => 'FILD_RESOURCES_ID_LABEL',
                        'value_options' => $this->getResorces(),
                        "disable_inarray_validator" => true,
                    ),
                    'attributes' => array(
                        'id' => 'resources_id',
                        'title' => 'FILD_RESOURCES_ID_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_RESOURCES_ID_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );
        
      


        //put your code here
        //############################################ informações da coluna description ##############################################:
        $this->add(
                array(
                    'type' => 'textarea',
                    'name' => 'description',
                    'options' => array(
                        'label' => 'FILD_DESCRIPTION_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'description',
                        'title' => 'FILD_DESCRIPTION_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_DESCRIPTION_PLACEHOLDER',
                        'rows' => '5',
                        'cols' => '20',
                        'data-access' => '3',
                        'data-position' => 'geral',
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
                        'data-access' => '3',
                        'value'=>$this->authservice['id'],
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna alias ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'alias',
                    'options' => array(
                        'label' => 'FILD_ALIAS_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'alias',
                        'title' => 'FILD_ALIAS_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_ALIAS_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );
        //############################################ informações da coluna modified_by ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'modified_by',
                    'options' => array(
                        'label' => 'FILD_MODIFIED_BY_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'modified_by',
                        'value'=>$this->authservice['id'],
                        'data-access' => '3',
                        'data-position' => 'geral',
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
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna state ##############################################:
        $this->add(
                array(
                    'type' => 'select',
                    'name' => 'state',
                    'options' => array(
                        'label' => 'FILD_STATE_LABEL',
                        'value_options' => self::$STATE,
                        "disable_inarray_validator" => true,
                    ),
                    'attributes' => array(
                        'id' => 'state',
                        'title' => 'FILD_STATE_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_STATE_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna access ##############################################:
        $this->add(
                array(
                    'type' => 'select',
                    'name' => 'access',
                    'options' => array(
                        'label' => 'FILD_ACCESS_LABEL',
                        'value_options' => $this->getRoles(),
                        "disable_inarray_validator" => true,
                    ),
                    'attributes' => array(
                        'id' => 'access',
                        'title' => 'FILD_ACCESS_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_ACCESS_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna created ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'created',
                    'options' => array(
                        'label' => 'FILD_CREATED_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'created',
                        'title' => 'FILD_CREATED_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_CREATED_PLACEHOLDER',
                        'readonly' => true,
                        'data-access' => '3',
                        'value' => date("d-m-Y"),
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
                    'type' => 'text',
                    'name' => 'publish_up',
                    'options' => array(
                        'label' => 'FILD_PUBLISH_UP_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'publish_up',
                        'title' => 'FILD_PUBLISH_UP_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_PUBLISH_UP_PLACEHOLDER',
                        'value' => date("d-m-Y H:i:s"),
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna publish_down ##############################################:
        $this->add(
                array(
                    'type' => 'text',
                    'name' => 'publish_down',
                    'options' => array(
                        'label' => 'FILD_PUBLISH_DOWN_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'publish_down',
                        'title' => 'FILD_PUBLISH_DOWN_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_PUBLISH_DOWN_PLACEHOLDER',
                        'value' => date("d-m-Y H:i:s"),
                        'data-access' => '3',
                        'data-position' => 'geral',
                    ),
                )
        );

       
    }

}
