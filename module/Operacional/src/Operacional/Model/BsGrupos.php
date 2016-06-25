<?php
namespace Operacional\Model;
/**
 * Class [TIPO]
 */
use Base\Model\AbstractModel;
/**
 * Description of BsGrupos
 *
 * @author Claudio
 * @copyright (c) year, Claudio Campos
 */
class BsGrupos extends AbstractModel {
    
    protected $icone;

    public function getIcone()
    {
    	return $this->icone;
    }

    public function setIcone($icone)
    {
    	$this->icone=$icone;
    }
}
