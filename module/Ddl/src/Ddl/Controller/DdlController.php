<?php

namespace Ddl\Controller;

use Zend\Db\Sql\Ddl\Constraint;
use Zend\Db\Sql\Ddl\Column;
use Zend\Db\Sql\Sql;

/**
 * DdlController [TIPO]
 *
 * @copyright (c) year, Claudio Coelho
 */
class DdlController extends \Base\Controller\AbstractController {

    public function __construct() {
        $this->route = "admin/default";
        $this->controller = "ddl";
        $this->action = "index";
        $this->form = "Ddl\Form\TabelaForm";
        $this->model = "Ddl\Model\Tabela";
        $this->table = "Ddl\Model\TabelaTable";
        $this->template = "admin/admin/listar";
    }

    public function creatingAction() {
        $request = $this->getRequest();
        if ($request->isPost()) {
            $data = $this->params()->fromPost();
            extract($data);
            $table = new \Zend\Db\Sql\Ddl\CreateTable($title);
            $table->setTable('bar');
            $table->addColumn(new Column\Integer(
                    'id', true, null, ['auto_increment' => true]
            ));
            $table->addColumn(new Column\Varchar("codigo", 250));
            $table->addColumn(new Column\Integer("empresa", TRUE, "0"));
            $table->addColumn(new Column\Varchar('title', 255));
            $table->addColumn(new Column\Varchar('asset_id', 255));
            $table->addColumn(new Column\Text('description'));
            $table->addColumn(new Column\Integer("ordering", TRUE, "0"));
            $table->addColumn(new Column\Integer("state", TRUE, "1"));
            $table->addColumn(new Column\Integer("access", TRUE, "3"));
            $table->addColumn(new Column\Integer("created_by", TRUE, "0"));
            $table->addColumn(new Column\Integer("modified_by", TRUE, "0"));
            $table->addColumn(new Column\Varchar('alias', 100));
            $table->addColumn(new Column\Date("created"));
            $table->addColumn(new Column\Datetime("modified"));
            $table->addColumn(new Column\Datetime("publish_up"));
            $table->addColumn(new Column\Datetime("publish_down"));
            $table->addConstraint(new Constraint\PrimaryKey('id'));
            $table->addConstraint(
                    new Constraint\UniqueKey(['codigo'], 'my_unique_key')
            );
        }
        $execute = $this->execute($table);
        $result = [
            'result' => $this->result,
            'query' => $execute->getResourse()->queryString
        ];
        return new \Zend\View\Model\JsonModel($result);
    }

    public function changeAction() {
        $execute = $this->execute($table);
        $result = [
            'result' => $this->result,
            'query' => $execute->getResourse()->queryString
        ];
    }

    private function execute($table) {
        
    }

    public function indexAction() {

        $adapter = $this->getAdapter();
//        // existence of $adapter is assumed
        $sql = new Sql($adapter);
        $drop = new \Zend\Db\Sql\Ddl\DropTable('bar');
//        $adapter->query(
//                $sql->getSqlStringForSqlObject($drop), $adapter::QUERY_MODE_EXECUTE
//        );
        $table = new \Zend\Db\Sql\Ddl\CreateTable();
        $table->setTable('bar');
        $table->addColumn(new Column\Integer(
                'id', true, null, ['auto_increment' => true]
        ));
        $table->addColumn(new Column\Varchar("codigo", 250));
        $table->addColumn(new Column\Integer("empresa", TRUE, "0"));
        $table->addColumn(new Column\Varchar('title', 255));
        $table->addColumn(new Column\Varchar('asset_id', 255));
        $table->addColumn(new Column\Text('description'));
        $table->addColumn(new Column\Integer("ordering", TRUE, "0"));
        $table->addColumn(new Column\Integer("state", TRUE, "1"));
        $table->addColumn(new Column\Integer("access", TRUE, "3"));
        $table->addColumn(new Column\Integer("created_by", TRUE, "0"));
        $table->addColumn(new Column\Integer("modified_by", TRUE, "0"));
        $table->addColumn(new Column\Varchar('alias', 100));
        $table->addColumn(new Column\Date("created"));
        $table->addColumn(new Column\Datetime("modified"));
        $table->addColumn(new Column\Datetime("publish_up"));
        $table->addColumn(new Column\Datetime("publish_down"));

        $table->addConstraint(new Constraint\PrimaryKey('id'));
        $table->addConstraint(
                new Constraint\UniqueKey(['codigo', 'empresa'], 'my_unique_key')
        );
        echo $sql->getSqlStringForSqlObject($table);
//        $result = $adapter->query(
//                $sql->getSqlStringForSqlObject($table), $adapter::QUERY_MODE_EXECUTE
//        );
//        \Zend\Debug\Debug::dump($result->getResource()->queryString);
        die;
        return parent::indexAction();
    }

}
