<?php

namespace ZenCode\Services;

use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\DocBlockGenerator;
use Zend\Code\Generator\DocBlock\Tag;
use Zend\Code\Generator\MethodGenerator;
use Zend\Code\Generator\PropertyGenerator;
use Zend\Code\Generator\FileGenerator;

/**
 * BsImages [TIPO]
 *
 * @copyright (c) year, Claudio Coelho
 */
class Options {

    public static $ignore = [
        1 => 'id', 2 => 'codigo',
        3 => 'asset_id', 4 => 'empresa',
        5 => 'title', 6 => 'description',
        7 => 'state', 8 => 'access',
        9 => 'ordering', 10 => 'alias',
        11 => 'created_by', 12 => 'modified_by',
        13 => 'created', 14 => 'publish_up',
        15 => 'publish_down', 16 => 'modified'];
    protected $name;
    protected $nameSpace;
    protected $baseDir = './module';
    protected $subDir;
    protected $moduleInfo;
    protected $generateClasse;
    protected $extends;
    protected $impements = array();
    protected $method = array();
    protected $parameter;
    protected $docblock = null;
    protected $properties = array();
    protected $constants = array();
    protected $body = array();
    protected $uses = array();
    protected $posfix;
    protected $prefix;
    protected $user;
    protected $table;
    protected $sl;
    protected $resutl;

    public function getName() {
        return $this->name;
    }

    public function getNameSpace() {
        return $this->nameSpace;
    }

    public function getBaseDir() {
        return $this->baseDir;
    }

    public function getSubDir() {
        return $this->subDir;
    }

    public function getModuleInfo() {
        return $this->moduleInfo;
    }

    public function getGenerateClasse() {
        return $this->generateClasse;
    }

    public function getExtends() {
        return $this->extends;
    }

    public function getImpements() {
        return $this->impements;
    }

    public function getMethod() {
        return $this->method;
    }

    public function getParameter() {
        return $this->parameter;
    }

    public function getDocblock() {
        if (is_null($this->docblock)) {
            $this->setDocblock();
        }
        return $this->docblock;
    }

    public function getProperties() {
        return $this->properties;
    }

    public function getConstants() {
        return $this->constants;
    }

    public function getBody() {
        return $this->body;
    }

    public function getUses() {
        return $this->uses;
    }

    public function getPosfix() {
        return $this->posfix;
    }

    public function getPrefix() {
        return $this->prefix;
    }

    public function getUser() {
        return $this->user;
    }
    
    public function getTable() {
        return $this->table;
    }

    
    public function setName($name) {
        //$var = strtolower(utf8_encode($name));
        $var = ucwords(str_replace("_", " ", $name));
        $name = preg_replace('{\W}', '', preg_replace('{ +}', '', strtr(
                                utf8_decode(html_entity_decode($var)), utf8_decode('ÀÁÃÂÉÊÍÓÕÔÚÜÇÑàáãâéêíóõôúüçñ'), 'AAAAEEIOOOUUCNaaaaeeiooouucn')));
        $this->name = sprintf("%s%s%s", $this->getPrefix(), $name, $this->getPosfix());
    }

    public function setNameSpace($nameSpace) {
        $this->nameSpace = $nameSpace;
    }

    public function setBaseDir($baseDir) {
        $this->baseDir = $baseDir;
    }

    public function setSubDir($subDir) {
        $this->subDir = $subDir;
    }

    public function setModuleInfo($moduleInfo) {
        $this->moduleInfo = $moduleInfo;
    }

    public function setGenerateClasse(ClassGenerator $generateClasse) {
        $this->generateClasse = $generateClasse;
    }

    public function setExtends($extends) {
        $this->extends = $extends;
    }

    public function setImpements($impements) {
        $this->impements = $impements;
    }

    public function setMethod(Methods $method) {
        extract($method->toArray());
        // Configuring after instantiation
        $this->method[] = new MethodGenerator(
                $name, $parameter, MethodGenerator::FLAG_PUBLIC, $body, DocBlockGenerator::fromArray(array(
                    'shortDescription' => $short_description,
                    'longDescription' => $long_description,
                    'tags' => array(
                        new Tag\ReturnTag(array(
                            'datatype' => $datatype,
                                )),
                    ),
                ))
        );
        return $this;
    }

    public function setParameter($parameter) {
        $this->parameter = $parameter;
    }

    /**
     * 
     * @param array $docblock
     * @return \Base\Code\Generator\MetaData
     */
    public function setDocblock(array $docblock = array('shortDescription' => 'SIGA-Smart', 'longDescription' => 'Esta class foi gerada via Zend\Code\Generator.')) {
        //$shortDescription = 'Sample generated class', $longDescription = 'This is a class generated with Zend\Code\Generator.') {
        extract($docblock);
        $this->docblock = DocBlockGenerator::fromArray(array(
                    'shortDescription' => $shortDescription,
                    'longDescription' => $longDescription,
                    'tags' => array(
                    // array(
                    //     'name'        => 'version',
                    //     'description' => '$Rev:$',
                    // ),
                    // array(
                    //     'name'        => 'license',
                    //     'description' => 'New BSD',
                    // ),
                    ),
        ));
        return $this;
    }

    public function setProperties($properties) {
        extract($properties);
        $flagArray = array('FLAG_PUBLIC' => PropertyGenerator::FLAG_PUBLIC, 'FLAG_PROTECTED' => PropertyGenerator::FLAG_PROTECTED, 'FLAG_PRIVATE' => PropertyGenerator::FLAG_PRIVATE);
        $this->properties[] = array($name, $value, $flagArray[$flag]);
    }

    public function setConstants($constants) {
        $this->constants = $constants;
    }

    public function setBody($body) {
        if ($body === 'limpa') {
            unset($this->body);
        } else {
            $this->body[] = $body;
        }
    }

    public function setUses($uses) {
        $this->uses = $uses;
    }

    public function setPosfix($posfix) {
        $this->posfix = $posfix;
    }

    public function setPrefix($prefix) {
        $this->prefix = $prefix;
    }

    public function setUser($user) {
        $this->user = $user;
    }
    
    public function setTable($tabela) {
        $table = $this->sl->get("Table");
        $table->setColumns($tabela);
        $this->table = $table;
        return $this;
    }

    
    public function generateClass(array $options = array('body' => null, 'shortDescription' => null, 'longDescription' => null)) {
        extract($options);
        $fileGenerate = FileGenerator::fromArray(array(
                    'classes' => array($this->getGenerateClasse()),
                    'docblock' => DocBlockGenerator::fromArray(array(
                        'shortDescription' => $shortDescription,
                        'longDescription' => $longDescription,
                        'tags' => array(
                            array(
                                'name' => 'license',
                                'description' => '© 2005 - 2016 by Zend Technologies Ltd. All rights reserved.',
                            ),
                        ),
                    )),
                    'body' => $body,
        ));
        $ds = DIRECTORY_SEPARATOR;
        $fileName = sprintf("%s{$ds}%s{$ds}%s.php", $this->getBaseDir(), $this->getSubDir(), $this->getName());
        $fileGenerate->setFilename($fileName)->write();
        return $fileGenerate->generate();
    }

    public function generateFile(array $options = array('caminho'=>'teste.txt','description' => null, 'shortDescription' => null, 'longDescription' => null)) {
        extract($options);
        $fileGenerate = new FileGenerator();
        $fileGenerate->setFilename($caminho)->setBody($description)->write();
        return $fileGenerate->generate();
    }

}
