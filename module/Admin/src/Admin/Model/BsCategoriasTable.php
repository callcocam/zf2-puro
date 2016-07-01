<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Admin\Model;

use Base\Model\AbstractTable;
use Zend\Db\TableGateway\TableGateway;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class BsCategoriasTable extends AbstractTable
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


}