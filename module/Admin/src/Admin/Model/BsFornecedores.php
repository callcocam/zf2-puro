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
class BsFornecedores extends AbstractModel
{

    protected $representante = '';

    protected $phone = '';

    protected $whatsapp = '';

    protected $email = '';

    protected $facebook = '';

    protected $twitter = '';

    protected $site = '';

    protected $cnpj = '';

    protected $ie = '';

    protected $cidade = '';

    protected $bairro = '';

    protected $endereco = '';

    protected $images = '';

    /**
     * get representante
     *
     * @return varchar
     */
    public function getRepresentante()
    {
        return $this->representante;
    }

    /**
     * get phone
     *
     * @return varchar
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * get whatsapp
     *
     * @return varchar
     */
    public function getWhatsapp()
    {
        return $this->whatsapp;
    }

    /**
     * get email
     *
     * @return varchar
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * get facebook
     *
     * @return varchar
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * get twitter
     *
     * @return varchar
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * get site
     *
     * @return varchar
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * get cnpj
     *
     * @return varchar
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * get ie
     *
     * @return varchar
     */
    public function getIe()
    {
        return $this->ie;
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
     * get bairro
     *
     * @return varchar
     */
    public function getBairro()
    {
        return $this->bairro;
    }

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
     * get images
     *
     * @return varchar
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * set representante
     *
     * @return varchar
     */
    public function setRepresentante($representante = null)
    {
        $this->representante=$representante;
        return $this;
    }

    /**
     * set phone
     *
     * @return varchar
     */
    public function setPhone($phone = null)
    {
        $this->phone=$phone;
        return $this;
    }

    /**
     * set whatsapp
     *
     * @return varchar
     */
    public function setWhatsapp($whatsapp = null)
    {
        $this->whatsapp=$whatsapp;
        return $this;
    }

    /**
     * set email
     *
     * @return varchar
     */
    public function setEmail($email = null)
    {
        $this->email=$email;
        return $this;
    }

    /**
     * set facebook
     *
     * @return varchar
     */
    public function setFacebook($facebook = null)
    {
        $this->facebook=$facebook;
        return $this;
    }

    /**
     * set twitter
     *
     * @return varchar
     */
    public function setTwitter($twitter = null)
    {
        $this->twitter=$twitter;
        return $this;
    }

    /**
     * set site
     *
     * @return varchar
     */
    public function setSite($site = null)
    {
        $this->site=$site;
        return $this;
    }

    /**
     * set cnpj
     *
     * @return varchar
     */
    public function setCnpj($cnpj = null)
    {
        $this->cnpj=$cnpj;
        return $this;
    }

    /**
     * set ie
     *
     * @return varchar
     */
    public function setIe($ie = null)
    {
        $this->ie=$ie;
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