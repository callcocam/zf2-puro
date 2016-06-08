<?php 
namespace Admin\Model;


/**
* BsCategorias
*/
class BsCategorias extends \Base\Model\AbstractModel {

   
    private $images;
    protected $url;
    public function getImages() {
        return $this->images;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setImages($images) {
        $this->images = $images;
        return $this;
    }

    public function setUrl($url) {
        $this->url = $url;
        return $this;
    }

}
