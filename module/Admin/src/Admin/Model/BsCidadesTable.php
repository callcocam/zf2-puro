<?php

/**
 * Class [TIPO]
 */

namespace Admin\Model;

/**
 * Description of BsCidadesTable
 *
 * @author Claudio
 * @copyright (c) year, Claudio Campos
 */
class BsCidadesTable extends \Base\Model\AbstractTable {
    public function __construct(\Zend\Db\TableGateway\TableGateway $tableGateway) {
        $this->tableGateway=$tableGateway;
    }
    public function getCidades()
    {
        $cidades=  $this->findBy(array('state'=>0));
        $repository=array();
        if($cidades):
            foreach ($cidades as $value):
              $repository[$value->getId()]=$value->getTitle();
            endforeach;
        endif;
        return $repository;
    }
}
