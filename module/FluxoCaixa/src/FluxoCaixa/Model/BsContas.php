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
class BsContas extends AbstractModel
{

    protected $conta_tipo = '';

    protected $banco_id = '';

    protected $tipo = '';

    protected $agencia = '';

    protected $conta = '';

    protected $gerente = '';

    protected $phone = '';

    protected $saldo = '';

    protected $situacao = '';

    /**
     * get conta_tipo
     *
     * @return int
     */
    public function getContaTipo()
    {
        return $this->conta_tipo;
    }

    /**
     * get banco_id
     *
     * @return int
     */
    public function getBancoId()
    {
        return $this->banco_id;
    }

    /**
     * get tipo
     *
     * @return varchar
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * get agencia
     *
     * @return varchar
     */
    public function getAgencia()
    {
        return $this->agencia;
    }

    /**
     * get conta
     *
     * @return varchar
     */
    public function getConta()
    {
        return $this->conta;
    }

    /**
     * get gerente
     *
     * @return varchar
     */
    public function getGerente()
    {
        return $this->gerente;
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
     * get saldo
     *
     * @return decimal
     */
    public function getSaldo()
    {
        return $this->saldo;
    }

    /**
     * get situacao
     *
     * @return int
     */
    public function getSituacao()
    {
        return $this->situacao;
    }

    /**
     * set conta_tipo
     *
     * @return int
     */
    public function setContaTipo($conta_tipo = null)
    {
        $this->conta_tipo=$conta_tipo;
        return $this;
    }

    /**
     * set banco_id
     *
     * @return int
     */
    public function setBancoId($banco_id = null)
    {
        $this->banco_id=$banco_id;
        return $this;
    }

    /**
     * set tipo
     *
     * @return varchar
     */
    public function setTipo($tipo = null)
    {
        $this->tipo=$tipo;
        return $this;
    }

    /**
     * set agencia
     *
     * @return varchar
     */
    public function setAgencia($agencia = null)
    {
        $this->agencia=$agencia;
        return $this;
    }

    /**
     * set conta
     *
     * @return varchar
     */
    public function setConta($conta = null)
    {
        $this->conta=$conta;
        return $this;
    }

    /**
     * set gerente
     *
     * @return varchar
     */
    public function setGerente($gerente = null)
    {
        $this->gerente=$gerente;
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
     * set saldo
     *
     * @return decimal
     */
    public function setSaldo($saldo = null)
    {
        $this->saldo=$saldo;
        return $this;
    }

    /**
     * set situacao
     *
     * @return int
     */
    public function setSituacao($situacao = null)
    {
        $this->situacao=$situacao;
        return $this;
    }


}