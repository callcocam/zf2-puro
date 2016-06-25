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
     protected $msg = "MSG_DEFAULT_LABEL";
    protected $insert;

    public function __construct() {
        $this->route = "admin/default";
        $this->controller = "ddl";
        $this->action = "index";
        $this->form = "";
        $this->model = "Operacional\Model\BsElements";
        $this->table = "Operacional\Model\BsElementsTable";
        $this->template = "ddl/index/bd";
    }

    public function creatingAction() {
        $this->form = 'CreateTableForm';
        $request = $this->getRequest();
        if ($request->isPost()) {
            $data = $this->params()->fromPost();
            $this->form = $this->getForm();
            $this->form->setData($data);
            if ($this->form->isValid()):
                extract($data);
                $table = new \Zend\Db\Sql\Ddl\CreateTable($tabela);
                $table->addColumn(new Column\Integer(
                        'id', true, null, ['auto_increment' => true]
                ));
                $this->gerarcampos($tabela, "id", "text", "Codigo Automatico", "controle");
                $table->addColumn(new Column\Integer("codigo", 11));
                $this->gerarcampos($tabela, "codigo", "text", "Codigo Unico", "controle");
                $table->addColumn(new Column\Integer("empresa", TRUE, "0"));
                $this->gerarcampos($tabela, "empresa", "hidden");
                $table->addColumn(new Column\Varchar('asset_id', 255));
                $this->gerarcampos($tabela, "asset_id", "text", "Campo Opcinal", "geral");
                $table->addColumn(new Column\Varchar('title', 255));
                $this->gerarcampos($tabela, "title", "text", "Titulo do Artigo", "geral");
                $table->addColumn(new Column\Text('description'));
                $this->gerarcampos($tabela, "description", "textarea", "Descrição Do Artigo", "geral");
                $table->addColumn(new Column\Integer("ordering", TRUE, "0"));
                $this->gerarcampos($tabela, "ordering", "hidden", "Define uma Ordem Personalizada", "controle");
                $table->addColumn(new Column\Integer("state", TRUE, "1"));
                $this->gerarcampos($tabela, "state", "select", "Ativa Ou Desabilita O Artigo", "controle");
                $table->addColumn(new Column\Integer("access", TRUE, "3"));
                $this->gerarcampos($tabela, "access", "select", "Define que pode acessar o registro", "controle");
                $table->addColumn(new Column\Integer("created_by", TRUE, "0"));
                $this->gerarcampos($tabela, "created_by", "hidden", "Codigo Unico", "geral");
                $table->addColumn(new Column\Integer("modified_by", TRUE, "0"));
                $this->gerarcampos($tabela, "modified_by", "hidden", "Modificado Por", "geral");
                $table->addColumn(new Column\Varchar('alias', 100));
                $this->gerarcampos($tabela, "alias", "text", "Apelido", "controle");
                $table->addColumn(new Column\Date("created"));
                $this->gerarcampos($tabela, "created", "text", "Data Da Criação", "datas");
                $table->addColumn(new Column\Datetime("modified"));
                $this->gerarcampos($tabela, "modified", "hidden");
                $table->addColumn(new Column\Datetime("publish_up"));
                $this->gerarcampos($tabela, "publish_up", "text", "Inicia Uma Publicação", "datas");
                $table->addColumn(new Column\Datetime("publish_down"));
                $this->gerarcampos($tabela, "publish_down", "text", "Finaliza Uma Publicação", "datas");
                $table->addConstraint(new Constraint\PrimaryKey('id'));
                $table->addConstraint(
                        new Constraint\UniqueKey(['codigo'], 'codigo')
                );
                $this->execute($table);
                if ($this->result):
                    foreach ($this->insert as $value):
                        $model = $this->getModel();
                        $model->exchangeArray($value);
                        $this->getTableGateway()->insert($model);
                        if (!$this->getTableGateway()->getResult()) {
                            $this->error = $this->getTableGateway()->getError();
                            $this->result = null;
                            $this->msg.=$this->error;
                            $this->classe=$this->getTableGateway()->getClass();
                        }
                    endforeach;
                endif;
            else:
                $msg = "";
                foreach ($this->form->getMessages() as $key => $value) {
                    $msg.= $key . " - " . implode(PHP_EOL, $value);
                }
                $this->msg = $msg;
            endif;
        }
        return new \Zend\View\Model\JsonModel(array('result' => $this->result, 'action' => '#change', 'codigo' => "0", 'class' => $this->classe, 'msg' => $this->msg));
    }

    private function execute($table) {
        try {
            $adapter = $this->getAdapter();
            $sql = new Sql($adapter);
            $adapter->query(
                    $sql->getSqlStringForSqlObject($table), $adapter::QUERY_MODE_EXECUTE
            );
            $this->classe = "trigger_success";
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
            $this->form = 'DropTableForm';
            $data = $this->params()->fromPost();
            $this->form = $this->getForm();
            $this->form->setData($data);
            if ($this->form->isValid()):
                extract($data);
                $drop = new \Zend\Db\Sql\Ddl\DropTable($tabela);
                $this->execute($drop);
                if ($this->result):
                    $this->getTableGateway()->deleteBy(['asset_id' => md5($tabela)]);
                    if (!$this->getTableGateway()->getResult()) {
                        $this->error = $this->getTableGateway()->getError();
                        $this->result = null;
                        $this->classe=$this->getTableGateway()->getClass();
                        $this->msg.=$this->error;
                    }
                endif;
            else:
                $msg = "";
                foreach ($this->form->getMessages() as $key => $value) {
                    $msg.= $key . " - " . implode(PHP_EOL, $value);
                }
                $this->msg = $msg;
            endif;
        }
        return new \Zend\View\Model\JsonModel(
                array('result' => $this->result, 'action' => '#change', 'codigo' => "0", 'class' => $this->classe, 'msg' => $this->msg)
        );
    }

    public function addcolumnAction() {
        $request = $this->getRequest();
        if ($request->isPost()) {
            $this->form = 'AddColumnForm';
            $data = $this->params()->fromPost();
            $data['new_name'] = $data['name'];
            $this->form = $this->getForm();
            $this->form->setData($data);
            if ($this->form->isValid()):
                extract($data);
                $table = new \Zend\Db\Sql\Ddl\AlterTable($tabela);
                $column = $this->setOptions($data);
                $column->setOption('after', $after);
                $table->addColumn($column);
                $this->gerarcampos($tabela, $data['new_name'], "text", $data['new_name'], "geral");
                $this->execute($table);
                $model = $this->getModel();
                $model->exchangeArray($this->insert[$data['new_name']]);
                if ($this->result):
                    $this->getTableGateway()->insert($model);
                    if (!$this->getTableGateway()->getResult()) {
                        $this->error = $this->getTableGateway()->getError();
                        $this->result = null;
                        $this->classe=$this->getTableGateway()->getClass();
                        $this->msg.=$this->error;
                    }
                endif;


            else:
                $msg = "";
                foreach ($this->form->getMessages() as $key => $value) {
                    $msg.= $key . " - " . implode(PHP_EOL, $value);
                }
                $this->msg = $msg;
            endif;
        }
        return new \Zend\View\Model\JsonModel(
                array('result' => $this->result, 'action' => '.select-tabela', 'codigo' => "0", 'class' => $this->classe, 'msg' => $this->msg)
        );
    }

    public function changeAction() {
        $request = $this->getRequest();
        $tabela = "";
        if ($request->isPost()) {
            $this->form = 'ChangeColumnForm';
            $data = $this->params()->fromPost();
            $this->form = $this->getForm();
            $this->form->setData($data);
            if ($this->form->isValid()):
                extract($data);
                $table = new \Zend\Db\Sql\Ddl\AlterTable($tabela);
                $column = $this->setOptions($data);
                $column->setOption('after', $after);
                $table->changeColumn($name, $column);
                $this->execute($table);
                //Se altero
                if ($this->result):
                    //Pesquisa pra ver se o campo existe na tabela de elements
                    $this->data = $this->getTableGateway()->findOneBy(['asset_id' => md5($tabela), 'name' => $name]);
                    //se existir
                    if ($this->data):
                        //alterar o nome
                        $this->data->setName($new_name);
                        //aterar a laebel
                        $this->data->setLabel(sprintf("FILD_%s_LABEL", strtoupper($new_name)));
                        //alterar o placehoder
                        $this->data->setPlaceholder(sprintf("FILD_%s_PLACEHOLDER", strtoupper($new_name)));
                        //alterar o alias
                        $this->data->setAlias(ucwords(str_replace("_", " ", $new_name)));
                        //carregar a model
                        $model = $this->getModel();
                        $model->exchangeArray($this->data->toArray());
                        //atualizar o campo
                        $this->getTableGateway()->update($model);
                        if (!$this->getTableGateway()->getResult()) {
                            $this->error = $this->getTableGateway()->getError();
                            $this->result = null;
                            $this->classe=$this->getTableGateway()->getClass();
                            $this->msg.=$this->error;
                        }
                    endif;
                endif;

            else:
                $msg = "";
                foreach ($this->form->getMessages() as $key => $value) {
                    $msg.= $key . " - " . implode(PHP_EOL, $value);
                }
                $this->msg = $msg;
            endif;
        }
        return new \Zend\View\Model\JsonModel(
                array('result' => $this->result, 'action' => '#tabela-change', 'tabela' => $tabela, 'class' => $this->classe, 'msg' => $this->msg)
        );
    }

    public function dropcolumnAction() {
        $request = $this->getRequest();
        if ($request->isPost()) {
            $this->form = 'DropColumnForm';
            $data = $this->params()->fromPost();
            $this->form = $this->getForm();
            $this->form->setData($data);
            if ($this->form->isValid()):
                extract($data);
                $table = new \Zend\Db\Sql\Ddl\AlterTable($tabela);
                $table->dropColumn($colunms);
                $this->execute($table);
                if ($this->result):
                    $this->getTableGateway()->deleteBy(['asset_id' => md5($tabela), 'name' => $colunms]);
                    if (!$this->getTableGateway()->getResult()) {
                        $this->error = $this->getTableGateway()->getError();
                        $this->result = null;
                        $this->classe=$this->getTableGateway()->getClass();
                        $this->msg = $this->error;
                    }
                endif;

            else:
                $msg = "";
                foreach ($this->form->getMessages() as $key => $value) {
                    $msg.= $key . " - " . implode(PHP_EOL, $value);
                }
                $this->msg = $msg;
            endif;
        }
        return new \Zend\View\Model\JsonModel(
                array('result' => $this->result, 'action' => '.select-tabela', 'class' => $this->classe, 'msg' => $this->msg)
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
                $column->setOption('unsigned', true);
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
            $this->classe="trigger_success";
            $this->msg="CAMPOS SLECIONADOS COM SUCESSO";
        endif;
        return new \Zend\View\Model\JsonModel(
                array('result' => $this->result, 'codigo' => "0", 'class' => $this->classe, 'msg' => $this->msg)
        );
    }

    public function columnsAction() {
        $tabela = $this->params()->fromQuery("tabela", '');
        if (!empty($tabela)):
            $table = new \Base\MetaData\Table($this->getAdapter());
            $table->setColumns($tabela);
            $this->result = $table->getColumnsName();
            $this->classe="trigger_success";
            $this->msg="CAMPOS SLECIONADOS COM SUCESSO";
        endif;
        return new \Zend\View\Model\JsonModel(
                array('result' => $this->result, 'codigo' => "0", 'class' => $this->classe, 'msg' => $this->msg)
        );
    }

    public function gerarcampos($tabela, $fild, $type, $desc = "", $pos = "geral") {
        $this->insert[$fild] = [
            'id' => null,
            'codigo' => null,
            'empresa' => $this->user['empresa'],
            'asset_id' => md5($tabela),
            'title' => $fild,
            'type' => $type,
            'name' => $fild,
            'label' => sprintf("FILD_%s_LABEL", strtoupper($fild)),
            'class' => 'form-control',
            'placeholder' => sprintf("FILD_%s_PLACEHOLDER", strtoupper($fild)),
            'rows' => $type == "textarea" ? '10' : '',
            'cols' => $type == "textarea" ? '20' : '',
            'valor_padrao' => '',
            'value_options' => '',
            'requerid' => '1',
            'readonly' => '0',
            'multiple' => '0',
            'position' => $pos,
            'description' => $desc,
            'ordering' => count($this->insert),
            'state' => '0',
            'access' => '3',
            'created_by' => $this->user['id'],
            'modified_by' => $this->user['id'],
            'alias' => ucwords(str_replace("_", " ", $fild)),
            'created' => date("d-m-Y"),
            'modified' => date("d-m-Y H:i:s"),
            'publish_up' => date("d-m-Y H:i:s"),
            'publish_down' => date("d-m-Y H:i:s")
        ];
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
