<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Operacional\Model;

use Base\Model\AbstractModel;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class BsTradutor extends AbstractModel
{
    protected $dica_tela;
    protected $placeholder;
    public function getDicaTela() {
        return $this->dica_tela;
    }

    public function getPlaceholder() {
        return $this->placeholder;
    }

    public function setDicaTela($dica_tela) {
        $this->dica_tela = $dica_tela;
        return $this;
    }

    public function setPlaceholder($placeholder) {
        $this->placeholder = $placeholder;
        return $this;
    }


}