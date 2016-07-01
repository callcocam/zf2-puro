<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace FluxoCaixa\Model;

use Base\Model\AbstractTable;
use Zend\Db\TableGateway\TableGateway;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class BsContasReceberTable extends AbstractTable
{

    /**
     * construct do Table
     *
     * @return Base\Model\AbstractTable
     */
    public function __construct(TableGateway $tableGateway)
    {
        // Configurações iniciais do TableModel
        $this->tableGateway=$tableGateway;
    }

    public function getReceitas($condicao,$colunms="valor")
    {
        $select = $this->tableGateway->getSql()->select();
        $select->columns(array($colunms => new \Zend\Db\Sql\Expression("SUM({$colunms})")));
        $query = $this->tableGateway->getSql()->prepareStatementForSqlObject($select);
        $rowset = $query->execute();
        $receitas = $rowset->current();
        var_dump($receitas[$colunms]);
        if (!$receitas) {
            $receitas[$colunms] = 0;
        }
        return $receitas[$colunms];
    }



}