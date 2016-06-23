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
class BsClientes extends AbstractModel
{

    protected $endereco = '';

    protected $bairro = '';

    protected $cidade = '';

    protected $images = '';

    /**
     * get endereco
     *
     * @return varchar
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * get bairro
     *
     * @return varchar
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * get cidade
     *
     * @return int
     */
    public function getCidade()
    {
        return $this->cidade;
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
     * set endereco
     *
     * @return varchar
     */
    public function setEndereco($endereco = null)
    {
        $this->endereco=$endereco;
        return $this;
    }

    /**
     * set bairro
     *
     * @return varchar
     */
    public function setBairro($bairro = null)
    {
        $this->bairro=$bairro;
        return $this;
    }

    /**
     * set cidade
     *
     * @return int
     */
    public function setCidade($cidade = null)
    {
        $this->cidade=$cidade;
        return $this;
    }

    /**
     * set images
     *
     * @return varchar
     */
    public function setImages($images = null)
    {
        $this->images=$images;
        return $this;
    }


}

