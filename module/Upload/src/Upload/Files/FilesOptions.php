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

    /**
     * @var string
     */
    protected $maxSize = '1536MB';

    public function __construct(array $options = [], $basePath = "",$type='images') {

        $this->CheckFolder("{$basePath}{$this->ds}dist{$this->ds}{$type}");
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
     * @param string $maxSize
     * @return $this
     */
    public function setMaxSize($maxSize) {
        $this->maxSize = $maxSize;
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
