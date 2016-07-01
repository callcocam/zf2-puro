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
class BsMovimento extends AbstractModel
{

    protected $caixa_id = '';

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
     * set caixa_id
     *
     * @return int
     */
    public function setCaixaId($caixa_id = null)
    {
        $this->caixa_id=$caixa_id;
        return $this;
    }


}