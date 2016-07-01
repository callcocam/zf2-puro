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
class BsProdutos extends AbstractModel
{

    protected $subtitle = '';

    protected $barra = '';

    protected $tipo = '';

    protected $cat_id = '';

    protected $marca_id = '';

    protected $clfiscal = '';

    protected $ecfop = '';

    protected $scfop = '';

    protected $cst = '';

    protected $unidade_trib = '';

    protected $estoque = '';

    protected $estoque_minimo = '';

    protected $dim_heigth = '';

    protected $dim_width = '';

    protected $dim_depth = '';

    protected $dim_weight = '';

    protected $images = '';

    protected $pago = '';

    protected $marge_lucro = '';

    protected $valor = '';

    /**
     * get subtitle
     *
     * @return varchar
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * get barra
     *
     * @return text
     */
    public function getBarra()
    {
        return $this->barra;
    }

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
     * get cat_id
     *
     * @return int
     */
    public function getCatId()
    {
        return $this->cat_id;
    }

    /**
     * get marca_id
     *
     * @return int
     */
    public function getMarcaId()
    {
        return $this->marca_id;
    }

    /**
     * get clfiscal
     *
     * @return varchar
     */
    public function getClfiscal()
    {
        return $this->clfiscal;
    }

    /**
     * get ecfop
     *
     * @return varchar
     */
    public function getEcfop()
    {
        return $this->ecfop;
    }

    /**
     * get scfop
     *
     * @return varchar
     */
    public function getScfop()
    {
        return $this->scfop;
    }

    /**
     * get cst
     *
     * @return varchar
     */
    public function getCst()
    {
        return $this->cst;
    }

    /**
     * get unidade_trib
     *
     * @return varchar
     */
    public function getUnidadeTrib()
    {
        return $this->unidade_trib;
    }

    /**
     * get estoque
     *
     * @return int
     */
    public function getEstoque()
    {
        return $this->estoque;
    }

    /**
     * get estoque_minimo
     *
     * @return int
     */
    public function getEstoqueMinimo()
    {
        return $this->estoque_minimo;
    }

    /**
     * get dim_heigth
     *
     * @return decimal
     */
    public function getDimHeigth()
    {
        return $this->dim_heigth;
    }

    /**
     * get dim_width
     *
     * @return decimal
     */
    public function getDimWidth()
    {
        return $this->dim_width;
    }

    /**
     * get dim_depth
     *
     * @return decimal
     */
    public function getDimDepth()
    {
        return $this->dim_depth;
    }

    /**
     * get dim_weight
     *
     * @return decimal
     */
    public function getDimWeight()
    {
        return $this->dim_weight;
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
     * get pago
     *
     * @return decimal
     */
    public function getPago()
    {
        return $this->pago;
    }

    /**
     * get marge_lucro
     *
     * @return decimal
     */
    public function getMargeLucro()
    {
        return $this->marge_lucro;
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
     * set subtitle
     *
     * @return varchar
     */
    public function setSubtitle($subtitle = null)
    {
        $this->subtitle=$subtitle;
        return $this;
    }

    /**
     * set barra
     *
     * @return text
     */
    public function setBarra($barra = null)
    {
        $this->barra=$barra;
        return $this;
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
     * set cat_id
     *
     * @return int
     */
    public function setCatId($cat_id = null)
    {
        $this->cat_id=$cat_id;
        return $this;
    }

    /**
     * set marca_id
     *
     * @return int
     */
    public function setMarcaId($marca_id = null)
    {
        $this->marca_id=$marca_id;
        return $this;
    }

    /**
     * set clfiscal
     *
     * @return varchar
     */
    public function setClfiscal($clfiscal = null)
    {
        $this->clfiscal=$clfiscal;
        return $this;
    }

    /**
     * set ecfop
     *
     * @return varchar
     */
    public function setEcfop($ecfop = null)
    {
        $this->ecfop=$ecfop;
        return $this;
    }

    /**
     * set scfop
     *
     * @return varchar
     */
    public function setScfop($scfop = null)
    {
        $this->scfop=$scfop;
        return $this;
    }

    /**
     * set cst
     *
     * @return varchar
     */
    public function setCst($cst = null)
    {
        $this->cst=$cst;
        return $this;
    }

    /**
     * set unidade_trib
     *
     * @return varchar
     */
    public function setUnidadeTrib($unidade_trib = null)
    {
        $this->unidade_trib=$unidade_trib;
        return $this;
    }

    /**
     * set estoque
     *
     * @return int
     */
    public function setEstoque($estoque = null)
    {
        $this->estoque=$estoque;
        return $this;
    }

    /**
     * set estoque_minimo
     *
     * @return int
     */
    public function setEstoqueMinimo($estoque_minimo = null)
    {
        $this->estoque_minimo=$estoque_minimo;
        return $this;
    }

    /**
     * set dim_heigth
     *
     * @return decimal
     */
    public function setDimHeigth($dim_heigth = null)
    {
        $this->dim_heigth=$dim_heigth;
        return $this;
    }

    /**
     * set dim_width
     *
     * @return decimal
     */
    public function setDimWidth($dim_width = null)
    {
        $this->dim_width=$dim_width;
        return $this;
    }

    /**
     * set dim_depth
     *
     * @return decimal
     */
    public function setDimDepth($dim_depth = null)
    {
        $this->dim_depth=$dim_depth;
        return $this;
    }

    /**
     * set dim_weight
     *
     * @return decimal
     */
    public function setDimWeight($dim_weight = null)
    {
        $this->dim_weight=$dim_weight;
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

    /**
     * set pago
     *
     * @return decimal
     */
    public function setPago($pago = null)
    {
        $this->pago=$pago;
        return $this;
    }

    /**
     * set marge_lucro
     *
     * @return decimal
     */
    public function setMargeLucro($marge_lucro = null)
    {
        $this->marge_lucro=$marge_lucro;
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


}