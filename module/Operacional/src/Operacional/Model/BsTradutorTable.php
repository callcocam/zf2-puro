<?php

/**
 * Class [TIPO]
 */

namespace Operacional\Model;

/**
 * Description of BsCidadesTable
 *
 * @author Claudio
 * @copyright (c) year, Claudio Campos
 */
class BsTradutorTable extends \Base\Model\AbstractTable {

    public function __construct(\Zend\Db\TableGateway\TableGateway $tableGateway) {

        $this->tableGateway = $tableGateway;
    }

    public function insert(\Base\Model\AbstractModel $data) {
        parent::insert($data);
        if ($this->getLastInsert()):
            $caminho = str_replace("%s", DIRECTORY_SEPARATOR, ".%smodule%sBase%slanguage%spt_BR.php");
            $tradutorG = new \ZenCode\Services\GerarTradutor($this->findBy(array('state' => '0')));
            $tradutorG->generate($caminho);
            $this->error = sprintf("%s %s", $this->getError(), " A TRADUÇÃO FOI ATUALIZADA");
        endif;
        return $this->getLastInsert();
    }

    public function update(\Base\Model\AbstractModel $data) {
        parent::update($data);
        if ($this->getLastInsert()):
            $caminho = str_replace("%s", DIRECTORY_SEPARATOR, ".%smodule%sBase%slanguage%spt_BR.php");
            $tradutorG = new \ZenCode\Services\GerarTradutor($this->findBy(array('state' => '0')));
            $tradutorG->generate($caminho);
            $this->error = sprintf("%s %s", $this->getError(), " A TRADUÇÃO FOI ATUALIZADA");
        endif;
        return $this->getLastInsert();
    }

    public function delete($id) {
        parent::delete($id);
        if ($this->getLastInsert()):
            $caminho = str_replace("%s", DIRECTORY_SEPARATOR, ".%smodule%sBase%slanguage%spt_BR.php");
            $tradutorG = new \ZenCode\Services\GerarTradutor($this->findBy(array('state' => '0')));
            $tradutorG->generate($caminho);
            $this->error = sprintf("%s %s", $this->getError(), " A TRADUÇÃO FOI ATUALIZADA");
        endif;
        return $this->getLastInsert();
    }

}
