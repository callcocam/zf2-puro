<?php

namespace Upload\Model;

/**
 * BsImages [TIPO]
 *
 * @copyright (c) year, Claudio Coelho
 */
class BsImages extends \Base\Model\AbstractModel{
    
    protected $mimetype;
    protected $extension;
    protected $size;
    
    public function getMimetype() {
        return $this->mimetype;
    }

    public function getExtension() {
        return $this->extension;
    }

    public function getSize() {
        return $this->size;
    }

    public function setMimetype($mimetype) {
        $this->mimetype = $mimetype;
        return $this;
    }

    public function setExtension($extension) {
        $this->extension = $extension;
        return $this;
    }

    public function setSize($size) {
        $this->size = $size;
        return $this;
    }


}
