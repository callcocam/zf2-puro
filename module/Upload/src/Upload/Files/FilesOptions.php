<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Upload\Files;

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
    protected $ds = DIRECTORY_SEPARATOR;
    protected $mimetype;

    /**
     * @var string
     */
    protected $maxSize = '1536MB';

    public function __construct(\Zend\ServiceManager\ServiceLocatorInterface $sm) {
       
        $config = $sm->get('Config');
        $serviceMimeTypes = new MimeTypes($sm->get('servicemanager'));
        $this->setMimetype($serviceMimeTypes->getMimeTypeImage('ext-image-min'));
        $options = isset($config['files']) ? $config['files'] : [];
        $type = 'images';
        $this->CheckFolder("{$sm->get('request')->getServer('DOCUMENT_ROOT')}{$this->ds}dist{$this->ds}{$type}");
        $options['base_path'] = $this->basePath;

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
            throw new \InvalidArgumentException('Provided base path is not a valid directory');
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
     * @param type $mimetype
     * @return \Upload\Files\FilesOptions
     */
    public function setMimetype($mimetype) {
        $this->mimetype = $mimetype;
        return $this;
    }

    
    //Verifica e cria os diretórios com base em tipo de arquivo, ano e mês!
    private function CheckFolder($Folder) {
        list($y, $m) = explode('/', date('Y/m'));
        $this->CreateFolder("{$Folder}");
        $this->CreateFolder("{$Folder}{$this->ds}{$y}");
        $this->CreateFolder("{$Folder}{$this->ds}{$y}{$this->ds}{$m}{$this->ds}");
        $this->basePath = "{$Folder}{$this->ds}{$y}{$this->ds}{$m}{$this->ds}";
    }

    //Verifica e cria o diretório base!
    private function CreateFolder($Folder) {
        if (!file_exists($Folder) && !is_dir($Folder)):
            mkdir($Folder, 0777);
        endif;
    }

}
