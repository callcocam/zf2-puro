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
            'name' => 'save_new',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'BTN_SAVE_NEW_LABEL',
                'title' => 'BTN_SAVE_NEW_DESC',
                'class' => 'btn btn-yellow submitbutton',
                'id' => 'save_new',
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
        
        $this->add(array(
            'name' => 'save_close',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'BTN_SAVE_CLOSE_LABEL',
                'title' => 'BTN_SAVE_CLOSE_DESC',
                'class' => 'btn btn-red submitbutton',
                'id' => 'save_close',
            ),
        ));

      
    }

    public static $STATE = ['0' => "OPTION_PUBLICADO_LABEL", '1' => "OPTION_ARQUIVADO_LABEL", '2' => "OPTION_LIXEIRA_LABEL"];
    public static $DAFAULT_USER = 2;
    public static $DAFAULT_STATE = 1;
    public static $DAFAULT_ACCESS = 2;
    public static $TIPO_MODULO=['1' => "OPTION_MODULO_LABEL", '2' => "OPTION_COMPONENTE_LABEL", '3' => "OPTION_ARQUIVO_LABEL"];
    public static $MODULE_PAI=['1' => "OPTION_ADMIN_LABEL", '2' => "OPTION_HOME_LABEL"];
    public static $GROUP_ID=['1' => "GROUP_OPERACIONAL_LABEL", '2' => "GROUP_HOME_LABEL"];
    public static $MODULES=['Admin' => "Modulo Admin", 'Home' => "Mdulo Home"];

    public function setValueOption($table, $condicao = array('state' => '0')) {
        $dados = $this->getServiceLocator()->get($table)->findALL();
        $valueOptions = array();
        if ($dados):
            foreach ($dados as $value):
                $valueOptions[$value->getId()] = $value->getTitle();
            endforeach;
        endif;
        return $valueOptions;
    }
    
    public function getTabelas() {
         $table=new \Base\MetaData\Table($this->serviceLocator->get('Zend\Db\Adapter\Adapter'));
         $tableNames['']='--Selecione--';
         if($table->getTablenames()):
             foreach ($table->getTablenames() as $value):
             $tableNames[$value]=$value;
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

}
