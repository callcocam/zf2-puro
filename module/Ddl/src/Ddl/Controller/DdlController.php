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

    protected $result = 0;
    protected $class = 'trigger_error';
    protected $msg = "MSG_DEFAULT_LABEL";

    public function __construct() {
        $this->route = "admin/default";
        $this->controller = "ddl";
        $this->action = "index";
        $this->form = "Ddl\Form\TabelaForm";
        $this->model = ""; //Ddl\Model\Tabela";
        $this->table = ""; //"Ddl\Model\TabelaTable";
        $this->template = "ddl/index/bd";
    }

    public function creatingAction() {
        $this->form='CreateTableForm';
        $request = $this->getRequest();
        if ($request->isPost()) {
            $data = $this->params()->fromPost();
            $this->form=$this->getForm();
            $this->form->setData($data);
            if($this->form->isValid()):
            extract($data);
            $table = new \Zend\Db\Sql\Ddl\CreateTable($tabela);
            $table->addColumn(new Column\Integer(
                    'id', true, null, ['auto_increment' => true]
            ));
            $table->addColumn(new Column\Integer("codigo", 11));
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
            $this->execute($table);
            else:
            $msg="";
            foreach ($this->form->getMessages() as $key => $value) {
               $msg=implode(PHP_EOL,$value);
            }
            $this->msg=$msg;
            endif;
        }
        return new \Zend\View\Model\JsonModel(
                array('result' => $this->result, 'action' => '#change', 'codigo' => "0", 'class' => $this->class, 'msg' => $this->msg)
        );
    }

    private function execute($table) {
        try {
            $adapter = $this->getAdapter();
            $sql = new Sql($adapter);
            $adapter->query(
                    $sql->getSqlStringForSqlObject($table), $adapter::QUERY_MODE_EXECUTE
            );
            $this->class = "trigger_success";
            $Tablenames = new \Base\MetaData\Table($this->getAdapter());
            $this->result = $Tablenames->getTablenames();
            $this->msg = $sql->getSqlStringForSqlObject($table);
        } catch (\PDOException $exc) {
            $this->result = null;
            $this->msg = sprintf("%s - %s", $exc->getCode(), $exc->getMessage());
        }
    }

    public function droptableAction() {
        $request = $this->getRequest();
           if ($request->isPost()) {
            $this->form='DropTableForm';
            $data = $this->params()->fromPost();
            $this->form=$this->getForm();
            $this->form->setData($data);
            if($this->form->isValid()):
            extract($data);
            $drop = new \Zend\Db\Sql\Ddl\DropTable($tabela);
            $this->execute($drop);
            else:
            $msg="";
            foreach ($this->form->getMessages() as $key => $value) {
               $msg=implode(PHP_EOL,$value);
            }
            $this->msg=$msg;
            endif;
        }
        return new \Zend\View\Model\JsonModel(
                array('result' => $this->result, 'action' => '#change', 'codigo' => "0", 'class' => $this->class, 'msg' => $this->msg)
        );
    }

    public function addcolumnAction() {
        $request = $this->getRequest();
        if ($request->isPost()) {
            $this->form='AddColumnForm';
            $data = $this->params()->fromPost();
            $data['new_name'] = $data['name'];
            $this->form=$this->getForm();
            $this->form->setData($data);
            if($this->form->isValid()):
            extract($data);
            $table = new \Zend\Db\Sql\Ddl\AlterTable($tabela);
            $table->addColumn($this->setOptions($data));
            $this->execute($table);
            else:
            $msg="";
            foreach ($this->form->getMessages() as $key => $value) {
               $msg=implode(PHP_EOL,$value);
            }
            $this->msg=$msg;
            endif;
        }
        return new \Zend\View\Model\JsonModel(
                array('result' => $this->result, 'action' => '.select-tabela', 'codigo' => "0", 'class' => $this->class, 'msg' => $this->msg)
        );
    }

    public function changeAction() {
        $request = $this->getRequest();
        $tabela = "";
        if ($request->isPost()) {
            $this->form='ChangeColumnForm';
            $data = $this->params()->fromPost();
            $this->form=$this->getForm();
            $this->form->setData($data);
            if($this->form->isValid()):
            extract($data);
            $table = new \Zend\Db\Sql\Ddl\AlterTable($tabela);
            $table->changeColumn($name, $this->setOptions($data));
            $this->execute($table);
            else:
            $msg="";
            foreach ($this->form->getMessages() as $key => $value) {
               $msg=implode(PHP_EOL,$value);
            }
            $this->msg=$msg;
            endif;
        }
        return new \Zend\View\Model\JsonModel(
                array('result' => $this->result, 'action' => '.select-tabela', 'tabela' => $tabela, 'class' => $this->class, 'msg' => $this->msg)
        );
    }

    public function dropcolumnAction() {
        $request = $this->getRequest();
        if ($request->isPost()) {
            $this->form='DropColumnForm';
            $data = $this->params()->fromPost();
            $this->form=$this->getForm();
            $this->form->setData($data);
            if($this->form->isValid()):
            extract($data);
            $table = new \Zend\Db\Sql\Ddl\AlterTable($tabela);
            $table->dropColumn($colunms);
            $this->execute($table);
            else:
            $msg="";
            foreach ($this->form->getMessages() as $key => $value) {
               $msg=implode(PHP_EOL,$value);
            }
            $this->msg=$msg;
            endif;
        }
        return new \Zend\View\Model\JsonModel(
                array('result' => $this->result, 'action' => '.select-tabela', 'class' => $this->class, 'msg' => $this->msg)
        );
    }

    private function setOptions($data) {
        extract($data);
        switch ($type) {
            case "Blob":
                $column = new \Zend\Db\Sql\Ddl\Column\Blob($new_name);
                break;
            case "Boolean":
                $column = new \Zend\Db\Sql\Ddl\Column\Boolean($new_name, boolval($nullable));
                break;
            case "Char":
                $column = new \Zend\Db\Sql\Ddl\Column\Char($new_name, $length);
                break;
            case "Date":
                $column = new \Zend\Db\Sql\Ddl\Column\Date($new_name);
                break;
            case "Decimal":
                $column = new \Zend\Db\Sql\Ddl\Column\Decimal($new_name, 10, 2);
                break;
            case "Float":
                $column = new \Zend\Db\Sql\Ddl\Column\Float($new_name, 10, 2);
                break;
            case "Integer":
                $column = new \Zend\Db\Sql\Ddl\Column\Integer($new_name, boolval($nullable));
                break;
            case "Time":
                $column = new \Zend\Db\Sql\Ddl\Column\Time($new_name, boolval($nullable));
                break;
            case "Datetime":
                $column = new \Zend\Db\Sql\Ddl\Column\Datetime($new_name, boolval($nullable));
                break;
            case "Varchar":
                $column = new \Zend\Db\Sql\Ddl\Column\Varchar($new_name, $length, $nullable);
                break;
            case "Text":
                $column = new \Zend\Db\Sql\Ddl\Column\Text($new_name);
                break;
        }
        return $column;
    }

    public function tabelaAction() {
        $tabela = $this->params()->fromQuery("tabela", '');
        if (!empty($tabela)):
            $table = new \Base\MetaData\Table($this->getAdapter());
            $table->setColumns($tabela);
            $this->result = $table->getColumnsName();
        endif;
        return new \Zend\View\Model\JsonModel(
                array('result' => $this->result, 'codigo' => "0", 'class' => $this->class, 'msg' => $this->msg)
        );
    }
    
     public function columnsAction() {
        $tabela = $this->params()->fromQuery("tabela", '');
        if (!empty($tabela)):
            $table = new \Base\MetaData\Table($this->getAdapter());
            $table->setColumns($tabela);
            $this->result = $table->getColumnsName();
        endif;
        return new \Zend\View\Model\JsonModel(
                array('result' => $this->result, 'codigo' => "0", 'class' => $this->class, 'msg' => $this->msg)
        );
    }

//    public function indexAction() {
//
//       $table=new \Base\MetaData\Table($this->getAdapter());
//            $table->setColumns("bs_companies");
//            $this->result=$table->getColumnsName();
//            \Zend\Debug\Debug::dump($this->result);
//        die;
//        return parent::indexAction();
//    }
}
