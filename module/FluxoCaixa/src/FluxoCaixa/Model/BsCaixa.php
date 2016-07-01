<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace FluxoCaixa\Model;

use Base\Model\AbstractModel;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class BsCaixa extends AbstractModel
{

    protected $said_real = '';

    protected $said_previsto = '';

    protected $ent_real = '';

    protected $ent_previsto = '';

    /**
     * get said_real
     *
     * @return decimal
     */
    public function getSaidReal()
    {
        return (string) $this->said_real;
    }

    /**
     * get said_previsto
     *
     * @return decimal
     */
    public function getSaidPrevisto()
    {
        return $this->said_previsto;
    }

    /**
     * get ent_real
     *
     * @return decimal
     */
    public function getEntReal()
    {
        return $this->ent_real;
    }

    /**
     * get ent_previsto
     *
     * @return decimal
     */
    public function getEntPrevisto()
    {
        return $this->ent_previsto;
    }

    /**
     * set said_real
     *
     * @return decimal
     */
    public function setSaidReal($said_real = null)
    {
        $this->said_real=$said_real;
        return $this;
    }

    /**
     * set said_previsto
     *
     * @return decimal
     */
    public function setSaidPrevisto($said_previsto = null)
    {
        $this->said_previsto=$said_previsto;
        return $this;
    }

    /**
     * set ent_real
     *
     * @return decimal
     */
    public function setEntReal($ent_real = null)
    {
        $this->ent_real=$ent_real;
        return $this;
    }

    /**
     * set ent_previsto
     *
     * @return decimal
     */
    public function setEntPrevisto($ent_previsto = null)
    {
        $this->ent_previsto=$ent_previsto;
        return $this;
    }


}