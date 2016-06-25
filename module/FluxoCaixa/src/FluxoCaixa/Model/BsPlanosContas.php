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

    protected $tipo = '';

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
     * set tipo
     *
     * @return varchar
     */
    public function setTipo($tipo = null)
    {
        $this->tipo=$tipo;
        return $this;
    }


}