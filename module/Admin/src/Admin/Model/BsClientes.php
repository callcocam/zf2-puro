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

    protected $bairro = '';

    protected $email = '';

    protected $imagesG = '';

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
     * get email
     *
     * @return varchar
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * get imagesG
     *
     * @return blob
     */
    public function getImagesg()
    {
        return $this->imagesG;
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
     * set imagesG
     *
     * @return blob
     */
    public function setImagesg($imagesG = null)
    {
        $this->imagesG=$imagesG;
        return $this;
    }


}

