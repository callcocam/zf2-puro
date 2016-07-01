<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Admin\Model;

use Base\Model\AbstractModel;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class BsCategorias extends AbstractModel
{

    protected $url = '';

    protected $images = '';

    /**
     * get url
     *
     * @return varchar
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * get images
     *
     * @return varchar
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * set url
     *
     * @return varchar
     */
    public function setUrl($url = null)
    {
        $this->url=$url;
        return $this;
    }

    /**
     * set images
     *
     * @return varchar
     */
    public function setImages($images = '')
    {
        $this->images=$images;
        return $this;
    }


}