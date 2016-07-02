<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Gestao\Model;

use Base\Model\AbstractModel;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class BsClientes extends AbstractModel
{

    protected $tipo = '';

    protected $cnpj = '';

    protected $rg = '';

    protected $ie = '';

    protected $phone = '';

    protected $whatsapp = '';

    protected $email = '';

    protected $facebook = '';

    protected $twitter = '';

    protected $cidade = '';

    protected $cep = '';

    protected $bairro = '';

    protected $endereco = '';

    protected $credito = '';

    protected $images = '';

    /**
     * get tipo
     *
     * @return int
     */
    public function getTipo()
    {
        return $this->tipo;
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
     * get rg
     *
     * @return varchar
     */
    public function getRg()
    {
        return $this->rg;
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
     * get cidade
     *
     * @return int
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * get cep
     *
     * @return varchar
     */
    public function getCep()
    {
        return $this->cep;
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
     * get credito
     *
     * @return datetime
     */
    public function getCredito()
    {
        return $this->credito;
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
     * set tipo
     *
     * @return int
     */
    public function setTipo($tipo = null)
    {
        $this->tipo=$tipo;
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
     * set rg
     *
     * @return varchar
     */
    public function setRg($rg = null)
    {
        $this->rg=$rg;
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
     * set cep
     *
     * @return varchar
     */
    public function setCep($cep = null)
    {
        $this->cep=$cep;
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
     * set credito
     *
     * @return datetime
     */
    public function setCredito($credito = null)
    {
        $this->credito=$credito;
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

