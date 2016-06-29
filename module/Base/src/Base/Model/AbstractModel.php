<?php

namespace Base\Model;
use Zend\Stdlib\Hydrator\ClassMethods;
/**
 * AbstractModel
 */
abstract class AbstractModel {

    private $id;
    private $codigo;
    private $asset_id;
    private $empresa;
    private $title;
    private $description;
    private $state;
    private $access;
    private $ordering;
    private $alias;
    private $created_by;
    private $modified_by;
    private $created;
    private $modified;
    private $publish_up;
    private $publish_down;

    public function getId() {
        return $this->id;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getAssetId() {
        return $this->asset_id;
    }

    public function getEmpresa() {
        return $this->empresa;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getState() {
        return $this->state;
    }

    public function getAccess() {
        return $this->access;
    }

    public function getOrdering() {
        return $this->ordering;
    }

    public function getAlias() {
        return $this->alias;
    }

    public function getCreatedBy() {
        return $this->created_by;
    }

    public function getModifiedBy() {
        return $this->modified_by;
    }

    public function getCreated() {
        return $this->created;
    }

    public function getModified() {
        return $this->modified;
    }

    public function getPublishUp() {
        return $this->publish_up;
    }

    public function getPublishDown() {
        return $this->publish_down;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
        return $this;
    }

    public function setAssetId($asset_id) {
        $this->asset_id = $asset_id;
        return $this;
    }

    public function setEmpresa($empresa) {
        $this->empresa = $empresa;
        return $this;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function setState($state) {
        $this->state = $state;
        return $this;
    }

    public function setAccess($access) {
        $this->access = $access;
        return $this;
    }

    public function setOrdering($ordering) {
        $this->ordering = $ordering;
        return $this;
    }

    public function setAlias($alias) {
        $this->alias = $alias;
        return $this;
    }

    public function setCreatedBy($created_by) {
        $this->created_by = $created_by;
        return $this;
    }

    public function setModifiedBy($modified_by) {
        $this->modified_by = $modified_by;
        return $this;
    }

    public function setCreated($created) {
        $this->created =  date('Y-m-d', strtotime($created));
        return $this;
    }

    public function setModified($modified) {
        $this->modified = date('Y-m-d H:i:s', strtotime($modified));
        return $this;
    }

    public function setPublishUp($publish_up) {
        $this->publish_up =  date('Y-m-d H:i:s', strtotime($publish_up));
        return $this;
    }

    public function setPublishDown($publish_down) {
        $this->publish_down = date('Y-m-d H:i:s', strtotime($publish_down));
        return $this;
    }
  

     public function exchangeArray($options = array()) {
        $hydrator = new ClassMethods();
        $hydrator->hydrate($options, $this);
    }

    public function toArray()
    {
        $hydrator=new ClassMethods();
        return $hydrator->extract($this);
    }

}
