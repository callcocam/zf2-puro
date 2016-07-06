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
class BsPlanosContas extends AbstractModel
{

    protected $parent_id = '';

    protected $tipo = '';

    /**
     * get parent_id
     *
     * @return int
     */
    public function getParentId()
    {
        return $this->parent_id;
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
     * set parent_id
     *
     * @return int
     */
    public function setParentId($parent_id = null)
    {
        $this->parent_id=$parent_id;
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


}

