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
class BsContasPagar extends AbstractModel
{

    protected $caixa_id = '';

    protected $situacao = '';

    protected $repete = '';

    protected $perildo = '';

    protected $qtdade = '';

    protected $conta_id = '';

    protected $valor = '';

    protected $plano_conta_id = '';

    protected $centro_custo_id = '';

    protected $tipo_documento = '';

    protected $num_documento = '';

    protected $fornecedor_id = '';

    protected $fpgto_id = '';

    protected $tipo_custo = '';

    protected $apropriacao_custo = '';

    /**
     * get caixa_id
     *
     * @return int
     */
    public function getCaixaId()
    {
        return $this->caixa_id;
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
     * get repete
     *
     * @return int
     */
    public function getRepete()
    {
        return $this->repete;
    }

    /**
     * get perildo
     *
     * @return int
     */
    public function getPerildo()
    {
        return $this->perildo;
    }

    /**
     * get qtdade
     *
     * @return int
     */
    public function getQtdade()
    {
        return $this->qtdade;
    }

    /**
     * get conta_id
     *
     * @return int
     */
    public function getContaId()
    {
        return $this->conta_id;
    }

    /**
     * get valor
     *
     * @return decimal
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * get plano_conta_id
     *
     * @return int
     */
    public function getPlanoContaId()
    {
        return $this->plano_conta_id;
    }

    /**
     * get centro_custo_id
     *
     * @return int
     */
    public function getCentroCustoId()
    {
        return $this->centro_custo_id;
    }

    /**
     * get tipo_documento
     *
     * @return int
     */
    public function getTipoDocumento()
    {
        return $this->tipo_documento;
    }

    /**
     * get num_documento
     *
     * @return varchar
     */
    public function getNumDocumento()
    {
        return $this->num_documento;
    }

    /**
     * get fornecedor_id
     *
     * @return int
     */
    public function getFornecedorId()
    {
        return $this->fornecedor_id;
    }

    /**
     * get fpgto_id
     *
     * @return int
     */
    public function getFpgtoId()
    {
        return $this->fpgto_id;
    }

    /**
     * get tipo_custo
     *
     * @return int
     */
    public function getTipoCusto()
    {
        return $this->tipo_custo;
    }

    /**
     * get apropriacao_custo
     *
     * @return int
     */
    public function getApropriacaoCusto()
    {
        return $this->apropriacao_custo;
    }

    /**
     * set caixa_id
     *
     * @return int
     */
    public function setCaixaId($caixa_id = null)
    {
        $this->caixa_id=$caixa_id;
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

    /**
     * set repete
     *
     * @return int
     */
    public function setRepete($repete = null)
    {
        $this->repete=$repete;
        return $this;
    }

    /**
     * set perildo
     *
     * @return int
     */
    public function setPerildo($perildo = null)
    {
        $this->perildo=$perildo;
        return $this;
    }

    /**
     * set qtdade
     *
     * @return int
     */
    public function setQtdade($qtdade = null)
    {
        $this->qtdade=$qtdade;
        return $this;
    }

    /**
     * set conta_id
     *
     * @return int
     */
    public function setContaId($conta_id = null)
    {
        $this->conta_id=$conta_id;
        return $this;
    }

    /**
     * set valor
     *
     * @return decimal
     */
    public function setValor($valor = null)
    {
        $this->valor=$valor;
        return $this;
    }

    /**
     * set plano_conta_id
     *
     * @return int
     */
    public function setPlanoContaId($plano_conta_id = null)
    {
        $this->plano_conta_id=$plano_conta_id;
        return $this;
    }

    /**
     * set centro_custo_id
     *
     * @return int
     */
    public function setCentroCustoId($centro_custo_id = null)
    {
        $this->centro_custo_id=$centro_custo_id;
        return $this;
    }

    /**
     * set tipo_documento
     *
     * @return int
     */
    public function setTipoDocumento($tipo_documento = null)
    {
        $this->tipo_documento=$tipo_documento;
        return $this;
    }

    /**
     * set num_documento
     *
     * @return varchar
     */
    public function setNumDocumento($num_documento = null)
    {
        $this->num_documento=$num_documento;
        return $this;
    }

    /**
     * set fornecedor_id
     *
     * @return int
     */
    public function setFornecedorId($fornecedor_id = null)
    {
        $this->fornecedor_id=$fornecedor_id;
        return $this;
    }

    /**
     * set fpgto_id
     *
     * @return int
     */
    public function setFpgtoId($fpgto_id = null)
    {
        $this->fpgto_id=$fpgto_id;
        return $this;
    }

    /**
     * set tipo_custo
     *
     * @return int
     */
    public function setTipoCusto($tipo_custo = null)
    {
        $this->tipo_custo=$tipo_custo;
        return $this;
    }

    /**
     * set apropriacao_custo
     *
     * @return int
     */
    public function setApropriacaoCusto($apropriacao_custo = null)
    {
        $this->apropriacao_custo=$apropriacao_custo;
        return $this;
    }


}