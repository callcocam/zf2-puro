<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Base\Form;

use Zend\Stdlib\AbstractOptions;

/**
 * Description of FilesOptions
 *
 * @author Call
 */

/**
 * Class Options
 * @author Alejandro Celaya Alastrué
 * @link http://www.wonnova.com
 */
class FilesOptions extends AbstractOptions {

    /**
     * @var string
     */
    protected $basePath = '';
    public $ds = DIRECTORY_SEPARATOR;
    protected $mimetype=[
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'application/pdf',
        'application/x-rar-compressed',
        'application/octet-stream',
        'application/zip',
        'audio/mp3',
        'video/mp4',
        'video/x-mpeg',
        'video/mp4',
        'audio/mpeg',
        'image/jpg',
        'image/jpeg',
        'image/pjpeg',
        'image/png',
        'image/x-png'];
    protected $send;
    protected $servicelocator;
    protected $overwrite=false;
    protected $use_upload_name=true;
    protected $use_upload_extension=false;
    protected $randomize=false;


    /**
     * @var string
     */
    protected $maxSize = '1536MB';
   

    public function __construct(\Zend\ServiceManager\ServiceLocatorInterface $sm) {
        $config = $sm->get('Config');
        $options = isset($config['files']) ? $config['files'] : [];
        $options['base_path'] = $sm->get('request')->getServer('DOCUMENT_ROOT');
        $this->servicelocator = $sm;
        parent::__construct($options);
    }

    /**
     * @return string
     */
    public function getBasePath() {
        return $this->basePath;
    }

    /**
     * @param string $basePath
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function setBasePath($basePath) {
        if (!is_dir($basePath)) {
            throw new \InvalidArgumentException('Provided base path is not a valid directory ' . $basePath);
        }
        $this->basePath = realpath($basePath);
        return $this;
    }

    /**
     * @return string
     */
    public function getMaxSize() {
        return $this->maxSize;
    }

    /**
     * 
     * @return type
     */
    public function getMimetype() {
        return $this->mimetype;
    }

    public function getSend() {
        return $this->send;
    }

    public function getServicelocator() {
        return $this->servicelocator;
    }

    /**
     * @param string $maxSize
     * @return $this
     */
    public function setMaxSize($maxSize) {
        $this->maxSize = $maxSize;
        return $this;
    }
    /**
     * 
     * @return type bool
     */
    public function getOverwrite() {
        return $this->overwrite;
    }
    /**
     * 
     * @return type bool
     */
    public function getUseUploadName() {
        return $this->use_upload_name;
    }
    /**
     * 
     * @return type bool
     */
    public function getUseUploadExtension() {
        return $this->use_upload_extension;
    }
        /**
     * 
     * @return type bool
     */
    public function getRandomize() {
        return $this->randomize;
    }
    
    /**
     * 
     * @param type $mimetype
     * @return \Upload\Files\FilesOptions
     */
    public function setMimetype($mimetype) {
        $this->mimetype = $mimetype;
        return $this;
    }

    //Verifica e cria os diretórios com base em tipo de arquivo, ano e mês!
    public function CheckFolder($Folder) {
        list($y, $m) = explode('/', date('Y/m'));
        $this->CreateFolder("{$this->basePath}{$this->ds}dist{$this->ds}{$Folder}");
        $this->CreateFolder("{$this->basePath}{$this->ds}dist{$this->ds}{$Folder}{$this->ds}{$y}");
        $this->CreateFolder("{$this->basePath}{$this->ds}dist{$this->ds}{$Folder}{$this->ds}{$y}{$this->ds}{$m}{$this->ds}");
        $this->basePath = "{$this->basePath}{$this->ds}dist{$this->ds}{$Folder}{$this->ds}{$y}{$this->ds}{$m}{$this->ds}";
        $this->send="{$Folder}{$this->ds}{$y}{$this->ds}{$m}{$this->ds}";
    }

    //Verifica e cria o diretório base!
    public function CreateFolder($Folder) {
        if (!file_exists($Folder) && !is_dir($Folder)):
            mkdir($Folder, 0777);
        endif;
    }

    //Verifica e monta o nome dos arquivos tratando a string!
    public function setFileName($Name) {
        $FileName = $this->setName(substr($Name, 0, strrpos($Name, '.')));
        return strtolower($FileName) . strrchr($Name, '.');
    }

    /**
     * <b>Tranforma URL:</b> Retira acentos e caracteres especias!
     * @param STRING $Name = Uma string qualquer
     * @return STRING um nome tratado
     */
    public function setName($Name) {
        $var = strtolower(utf8_encode($Name));
        return preg_replace('{\W}', '', preg_replace('{ +}', '_', strtr(
                                utf8_decode(html_entity_decode($var)), utf8_decode('ÀÁÃÂÉÊÍÓÕÔÚÜÇÑàáãâéêíóõôúüçñ'), 'AAAAEEIOOOUUCNaaaaeeiooouucn')));
    }

}
