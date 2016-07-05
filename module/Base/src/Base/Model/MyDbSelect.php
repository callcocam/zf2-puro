<?php

namespace Base\Model;
use Zend\Db\Sql\Select;
use Zend\Paginator\Adapter\DbSelect;

/**
 * MyDbSelect [TIPO]
 *
 * @copyright (c) year, Claudio Coelho
 */
class MyDbSelect extends DbSelect {

    public function count() {
        if ($this->rowCount) {
            return $this->rowCount;
        }

        $select = new Select();
        $select
                ->from('item_counts')
                ->columns(['c' => 'post_count']);

        $statement = $this->sql->prepareStatementForSqlObject($select);
        $result = $statement->execute();
        $row = $result->current();
        $this->rowCount = $row['c'];

        return $this->rowCount;
    }

}
