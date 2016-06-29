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
     * set parent_id
     *
     * @return int
     */
    public function setParentId($parent_id = null)
    {
        $this->parent_id=$parent_id;
        return $this;
    }


}