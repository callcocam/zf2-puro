<?php

/*
 * Class Abstract para formularios
 * 
 */

namespace Base\Form;

use Base\View\Helper\Form\Custom\Captcha\CustomCaptcha;

/**
 * Description of AbstractForm
 *
 * @author Claudio
 */
class AbstractForm extends \Zend\Form\Form {

    protected $serviceLocator;
    protected $authservice;
    protected $cache;
    protected $empresa;
    protected $captchaImage;
    protected $wordLen = 5;
    protected $width = 200;
    protected $height = 100;
    protected $dirdata = './data/fonts/arial.ttf';

    public function __construct($serviceLocator = null, $name = null, $options = array()) {
        parent::__construct($name, $options);
        $this->setAttribute("method", "post");
        $this->setAttribute("enctype", "multipart/form-data");
        $this->setAttribute("class", "form-horizontal formulario-configuracao Manager");
        $this->serviceLocator = $serviceLocator;
        $this->authservice = $this->getServiceLocator()->get('AuthService')->getIdentity();
        $this->cache = new \Base\Model\Cache();
        $this->empresa = $this->cache->getItem('companies');

        $urlcaptcha = sprintf("%s/%s", $this->serviceLocator->get('request')->getServer('DOCUMENT_ROOT'), 'images/captcha');
        // snip... other elements here
        //Create our custom captcha class
        $this->captchaImage = new CustomCaptcha(array(
            'font' => $this->dirdata,
            'width' => $this->width,
            'height' => $this->height,
            'wordLen' => $this->wordLen,
            'dotNoiseLevel' => 50,
            'lineNoiseLevel' => 3)
        );
        $this->captchaImage->setImgDir($urlcaptcha);
        // $captchaImage->setImgUrl($urlcaptcha);
        //############################################ informações da coluna id ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'id',
                    'options' => array(
                     //   'label' => 'FILD_ID_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'id',
                        'value' => 'AUTOMATICO',
                      //  'title' => 'FILD_ID_DESC',
                      //  'class' => 'form-control input-sm',
                      //  'placeholder' => 'FILD_ID_PLACEHOLDER',
                        'data-access' => '3',
                        'readonly' => true,
                        'data-position' => 'geral',
                    ),
                )
        );


        //############################################ informações da coluna codigo ##############################################:
        $this->add(
                array(
                    'type' => 'hidden',
                    'name' => 'codigo',
                    'options' => array(
                     //   'label' => 'FILD_CODIGO_LABEL',
                    ),
                    'attributes' => array(
                        'id' => 'codigo',
                        'value' => '00000',
                       // 'title' => 'FILD_CODIGOD_DESC',
                        'class' => 'form-control input-sm',
                       // 'placeholder' => 'FILD_CODIGO_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'geral',
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
                        'value' => md5($this->empresa['id']),
                        'data-access' => '3',
                        'data-position' => 'geral',
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
                        'data-access' => '3',
                        'data-position' => 'geral',
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
                        'data-access' => '3',
                        'data-position' => 'controle',
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
                        'value' => '0',
                        'data-position' => 'controle',
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
                        "disable_inarray_validator" => true,
                    ),
                    'attributes' => array(
                        'id' => 'state',
                        'title' => 'FILD_STATE_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_STATE_PLACEHOLDER',
                        'data-access' => '3',
                        'data-position' => 'controle',
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
                        "disable_inarray_validator" => true,
                    ),
                    'attributes' => array(
                        'id' => 'access',
                        'title' => 'FILD_ACCESS_DESC',
                        'class' => 'form-control input-sm',
                        'placeholder' => 'FILD_ACCESS_PLACEHOLDER',
                        'data-access' => '3',
                        'value'=>'3',
                        'data-position' => 'controle',
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
                        'data-position' => 'datas',
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
                        'data-access' => '3',
                        'data-position' => 'datas',
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
                        'data-access' => '3',
                        'readonly' => true,
                        'data-position' => 'datas',
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
                        'data-access' => '3',
                        'readonly' => true,
                        'data-position' => 'datas',
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
            'name' => 'save',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'BTN_SAVE_LABEL',
                'title' => 'BTN_SAVE_DESC',
                'class' => 'btn btn-green submitbutton',
                'id' => 'save',
            ),
        ));


        $this->add(array(
            'name' => 'save_copy',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'BTN_SAVE_COPY_LABEL',
                'title' => 'BTN_SAVE_COPY_DESC',
                'class' => 'btn btn-blue submitbutton',
                'id' => 'save_copy',
            ),
        ));

        if ($this->has('state')):
            $this->get('state')->setOptions(['value_options' => self::$STATE]);
        endif;

        if ($this->has('access')):
            $this->get('access')->setOptions(['value_options' => $this->getRoles($this->authservice['role_id'])]);
        endif;

        if ($this->has('empresa')):
            $this->get('empresa')->setValue($this->authservice['empresa']);
        endif;

        if ($this->has('created_by')):
            $this->get('created_by')->setValue($this->authservice['id']);
        endif;

        if ($this->has('modified_by')):
            $this->get('modified_by')->setValue($this->authservice['id']);
        endif;

        if ($this->has('created')):
            $this->get('created')->setValue(date("d-m-Y"));
        endif;

        if ($this->has('modified')):
            $this->get('modified')->setValue(date("d-m-Y H:i:s"));
        endif;

        if ($this->has('publish_up')):
            $this->get('publish_up')->setValue(date("d-m-Y H:i:s"));
        endif;

        if ($this->has('publish_down')):
            $this->get('publish_down')->setValue(date("d-m-Y H:i:s"));
        endif;

        if ($this->has('publish_down')):
            $this->get('publish_down')->setValue(date("d-m-Y H:i:s"));
        endif;

        
    }

    public static $STATE = ['0' => "OPTION_PUBLICADO_LABEL", '1' => "OPTION_ARQUIVADO_LABEL", '2' => "OPTION_LIXEIRA_LABEL"];
    public static $DAFAULT_USER = 2;
    public static $DAFAULT_STATE = 1;
    public static $DAFAULT_ACCESS = 2;
    public static $TIPO_MODULO = ['1' => "OPTION_MODULO_LABEL", '2' => "OPTION_COMPONENTE_LABEL", '3' => "OPTION_ARQUIVO_LABEL"];
    public static $MODULE_PAI = ['1' => "OPTION_ADMIN_LABEL", '2' => "OPTION_HOME_LABEL", '3' => "OPTION_OPREACIONAL_LABEL", '4' => "OPTION_FLUXO_CAIXA_LABEL", '5' => "OPTION_COMERCIAL_LABEL", '6' => "OPTION_CONTREOLEESTOQUE_LABEL"];
    public static $GROUP_ID = ['1' => "GROUP_OPERACIONAL_LABEL", '2' => "GROUP_HOME_LABEL", '3' => "OPTION_FLUXO_CAIXA_LABEL", '4' => "OPTION_COMERCIAL_LABEL"];
    public static $MODULES = ['Admin' => "Modulo Admin", 'Home' => "Mdulo Home", 'FluxoCaixa' => "OPTION_FLUXO_CAIXA_LABEL", 'Gestao' => "OPTION_COMERCIAL_LABEL","ControleEstoque"=>"OPTION_CONTREOLEESTOQUE_LABEL"];
    public static $DATE_INTEVAL=['+1 days'=>"ROTULO_DIARIO_LABEL",'+7 days'=>"ROTULO_SEMANAL_LABEL",'+15 days'=>"ROTULO_QUINSENAL_LABEL",'+1 month'=>"ROTULO_MENSAL_LABEL",'+6 month'=>"ROTULO_SEMESTRAL_LABEL",'+12 month'=>"ROTULO_ANUAL_LABEL"];
    public function setValueOption($table, $condicao = array('state' => '0')) {
        $dados = $this->getServiceLocator()->get($table)->findBy($condicao);
        $valueOptions = array('--SELECIONE--');
        if ($dados):
            foreach ($dados as $value):
                $valueOptions[$value->getId()] = $value->getTitle();
            endforeach;
        endif;

        return $valueOptions;
    }
    public function setCustonValueOption($table,$index='id',$valor='title', $condicao = array('state' => '0')) {
        $dados = $this->getServiceLocator()->get($table)->findBy($condicao);
        $valueOptions =[];
        if ($dados):
            foreach ($dados as $value):
                $op=$value->toArray();
                $valueOptions[$op[$index]] = $op[$valor];
            endforeach;
        endif;

        return $valueOptions;
    }

    public function getCaixa()
    {
        $cache= $this->serviceLocator->get('Cache');
        if($cache->hasItem('caixa')){
            $caixa=$cache->getItem('caixa');
           return $caixa['id'];
        }
        return '';
    }

    public function getTabelas() {
        $table = $this->serviceLocator->get('Table');
        $tableNames[''] = '--Selecione--';
        if ($table->getTablenames()):
            foreach ($table->getTablenames() as $value):
                $tableNames[$value] = $value;
            endforeach;
        endif;
        return $tableNames;
    }

    public function getRoles($roleId = '1') {
        $rolesAcl = \Acl\Model\Roles::$ROLES;
        $roles = array();
        foreach ($rolesAcl as $key => $value) {
            if ($key >= $roleId) {
                $roles[$key] = $value;
            }
        }
        return $roles;
    }

    public function getResorces() {
        $resourcesAcl = $this->serviceLocator->get('Acl\Model\Resources');
        $resources = $resourcesAcl->getResources();
        $valuesOptions = [];
        foreach ($resources as $key => $resource) {

            $valuesOptions[$key] = $resource;
        }
        return $valuesOptions;
    }

    public function getServiceLocator() {
        return $this->serviceLocator;
    }

    public function getAuthservice() {
        return $this->authservice;
    }

}
