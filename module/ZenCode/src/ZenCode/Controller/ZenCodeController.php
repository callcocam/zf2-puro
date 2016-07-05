<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/calcocam for the canonical source repository
 * @copyright Copyright (c) 2005-2016 SIGA-Smart. (http://www.sigasmart.com.br)
 */

namespace ZenCode\Controller;

use Zend\View\Model\JsonModel,
    Zend\View\Model\ViewModel;

/**
 * Description of ZenCodeController
 *
 * @author Call
 */
class ZenCodeController extends \Base\Controller\AbstractController {

    protected $restaura = false;

    public function __construct() {
        $this->route = "zen-code/default";
        $this->controller = "zen-code";
        $this->action = "index";
        $this->model = "ZenCode\Model\BsResources";
        $this->table = "ZenCode\Model\BsResourcesTable";
        $this->template = "/zen-code/zen-code/index";
        $this->use_paginator=FALSE;
        $this->item_per_page=1000;
    }

//    public function indexAction() {
//        $table=  $this->getServiceLocator()->get("Table");
//          $table->setColumns('bs_clientes');
//          \Zend\Debug\Debug::dump($table->getColumns());die;
//        return parent::indexAction();
//    }

    public function gerarmodelAction() {
        $id = $this->params()->fromRoute('id', 0);
        if ((int) $id):
            $this->data = $this->getTableGateway()->find($id);
            $caminho = str_replace("%s", DIRECTORY_SEPARATOR, ".%smodule%s{$this->data->getAlias()}%ssrc%s{$this->data->getAlias()}%sModel%s{$this->data->getArquivo()}.php");
            if (file_exists($caminho)) {
                $model = file_get_contents($caminho);
                $this->error = "ARQUIVO MODEL {$this->data->getArquivo()} JA EXISTE E PODE SER EDITADO!";
            } else {
                $modeG = new \ZenCode\Services\GerarModel($this->data, $this->getServiceLocator());
                $model = $modeG->generateClass();
                $this->error = "ARQUIVO MODEL {$this->data->getArquivo()} GERADO COM SUCESSO!";
            }
            $this->action = $this->data->getArquivo();
            $this->result = TRUE;
            $this->classe = "trigger_success";
            return new JsonModel(array('result' => $this->result, 'action' => $this->action, 'codigo' => $this->codigo, 'class' => $this->classe,
                'msg' => $this->error, 'data' => $model, 'caminho' => $caminho, 'id' => $id));
        endif;
        $view = new ViewModel(array(
            'route' => $this->route,
            'controller' => $this->controller,
            'action' => 'index'));
        $view->setTemplate('/admin/admin/deny');
        return $view;
    }

    public function gerartableAction() {
        $id = $this->params()->fromRoute('id', 0);
        if ((int) $id):
            $this->data = $this->getTableGateway()->find($id);
            $caminho = str_replace("%s", DIRECTORY_SEPARATOR, ".%smodule%s{$this->data->getAlias()}%ssrc%s{$this->data->getAlias()}%sModel%s{$this->data->getArquivo()}Table.php");
            if (file_exists($caminho)) {
                $table = file_get_contents($caminho);
                $this->error = "ARQUIVO TABLE {$this->data->getArquivo()} JA EXISTE E PODE SER EDITADO!";
            } else {
                $tableG = new \ZenCode\Services\GerarTable($this->data, $this->getServiceLocator());
                $table = $tableG->generateClass();
                $this->error = "ARQUIVO TABLE {$this->data->getArquivo()} GERADO COM SUCESSO!";
            }
            $this->action = sprintf("%s%s", $this->data->getArquivo(), "Table");
            $this->result = TRUE;
            $this->classe = "trigger_success";
            return new JsonModel(array('result' => $this->result, 'action' => $this->action, 'codigo' => $this->codigo, 'class' => $this->classe,
                'msg' => $this->error, 'data' => $table, 'caminho' => $caminho, 'id' => $id));
        endif;
        $view = new ViewModel(array(
            'route' => $this->route,
            'controller' => $this->controller,
            'action' => 'index'));
        $view->setTemplate('/admin/admin/deny');
        return $view;
    }

    public function gerarformAction() {
        $id = $this->params()->fromRoute('id', 0);
        if ((int) $id):
            $this->data = $this->getTableGateway()->find($id);
            $caminho = str_replace("%s", DIRECTORY_SEPARATOR, ".%smodule%s{$this->data->getAlias()}%ssrc%s{$this->data->getAlias()}%sForm%s{$this->data->getArquivo()}Form.php");
            if (file_exists($caminho)) {
                $form = file_get_contents($caminho);
                $this->error = "ARQUIVO FORM {$this->data->getArquivo()} JA EXISTE E PODE SER EDITADO!";
            } else {
                $formG = new \ZenCode\Services\GerarForm($this->data, $this->getServiceLocator());
                $form = $formG->generateClass();
            }
            $this->action = sprintf("%s%s", $this->data->getArquivo(), "Form");
            $this->result = TRUE;
            $this->error = "ARQUIVO FORM {$this->data->getArquivo()} GERADO COM SUCESSO!";
            $this->classe = "trigger_success";
            return new JsonModel(array('result' => $this->result, 'action' => $this->action, 'codigo' => $this->codigo, 'class' => $this->classe,
                'msg' => $this->error, 'data' => $form, 'caminho' => $caminho, 'id' => $id));
        endif;
        $view = new ViewModel(array(
            'route' => $this->route,
            'controller' => $this->controller,
            'action' => 'index'));
        $view->setTemplate('/admin/admin/deny');
        return $view;
    }

    public function gerarfilterAction() {
        $id = $this->params()->fromRoute('id', 0);
        if ((int) $id):
            $this->data = $this->getTableGateway()->find($id);
            $caminho = str_replace("%s", DIRECTORY_SEPARATOR, ".%smodule%s{$this->data->getAlias()}%ssrc%s{$this->data->getAlias()}%sForm%s{$this->data->getArquivo()}Filter.php");
            if (file_exists($caminho)) {
                $filter = file_get_contents($caminho);
                $this->error = "ARQUIVO FILTER {$this->data->getArquivo()} JA EXISTE E PODE SER EDITADO!";
            } else {
                $filterG = new \ZenCode\Services\GerarFilter($this->data, $this->getServiceLocator());
                $filter = $filterG->generateClass();
                $this->error = "ARQUIVO FILTER {$this->data->getArquivo()} GERADO COM SUCESSO!";
            }
            $this->action = sprintf("%s%s", $this->data->getArquivo(), "Filter");
            $this->result = TRUE;
            $this->classe = "trigger_success";
            return new JsonModel(array('result' => $this->result, 'action' => $this->action, 'codigo' => $this->codigo, 'class' => $this->classe,
                'msg' => $this->error, 'data' => $filter, 'caminho' => $caminho, 'id' => $id));
        endif;
        $view = new ViewModel(array(
            'route' => $this->route,
            'controller' => $this->controller,
            'action' => 'index'));
        $view->setTemplate('/admin/admin/deny');
        return $view;
    }

    public function gerarcontrollerAction() {
        $id = $this->params()->fromRoute('id', 0);
        if ((int) $id):
            $this->data = $this->getTableGateway()->find($id);
            $caminho = str_replace("%s", DIRECTORY_SEPARATOR, ".%smodule%s{$this->data->getAlias()}%ssrc%s{$this->data->getAlias()}%sController%s{$this->data->getArquivo()}Controller.php");
            if (file_exists($caminho)) {
                $controller = file_get_contents($caminho);
                $this->error = "ARQUIVO CONTROLLER {$this->data->getArquivo()} JA EXISTE E PODE SER EDITADO!";
            } else {
                $controllerG = new \ZenCode\Services\GerarController($this->data, $this->getServiceLocator());
                $controller = $controllerG->generateClass();
                $this->error = "ARQUIVO CONTROLLER {$this->data->getArquivo()} GERADO COM SUCESSO!";
            }
            $this->action = sprintf("%s%s", $this->data->getArquivo(), "Controller");
            $this->result = TRUE;
            $this->classe = "trigger_success";
            return new JsonModel(array('result' => $this->result, 'action' => $this->action, 'codigo' => $this->codigo, 'class' => $this->classe,
                'msg' => $this->error, 'data' => $controller, 'caminho' => $caminho, 'id' => $id));
        endif;
        $view = new ViewModel(array(
            'route' => $this->route,
            'controller' => $this->controller,
            'action' => 'index'));
        $view->setTemplate('/admin/admin/deny');
        return $view;
    }

    public function gerarformfactoryAction() {
        $id = $this->params()->fromRoute('id', 0);
        if ((int) $id):
            $this->data = $this->getTableGateway()->find($id);
            $caminho = str_replace("%s", DIRECTORY_SEPARATOR, ".%smodule%s{$this->data->getAlias()}%ssrc%s{$this->data->getAlias()}%sFactory%s{$this->data->getArquivo()}FormFactory.php");
            if (file_exists($caminho)) {
                $factory = file_get_contents($caminho);
                $this->error = "ARQUIVO FACTORY FORM {$this->data->getArquivo()} JA EXISTE E PODE SER EDITADO!";
            } else {
                $factoryG = new \ZenCode\Services\GerarFormFactory($this->data, $this->getServiceLocator());
                $factory = $factoryG->generateClass();
                $this->error = "ARQUIVO FACTORY FORM {$this->data->getArquivo()} GERADO COM SUCESSO!";
            }
            $this->action = sprintf("%s%s", $this->data->getArquivo(), "Factory");
            $this->result = TRUE;
            $this->classe = "trigger_success";
            return new JsonModel(array('result' => $this->result, 'action' => $this->action, 'codigo' => $this->codigo, 'class' => $this->classe,
                'msg' => $this->error, 'data' => $factory, 'caminho' => $caminho, 'id' => $id));
        endif;
        $view = new ViewModel(array(
            'route' => $this->route,
            'controller' => $this->controller,
            'action' => 'index'));
        $view->setTemplate('/admin/admin/deny');
        return $view;
    }

    public function gerarmodelfactoryAction() {
        $id = $this->params()->fromRoute('id', 0);
        if ((int) $id):
            $this->data = $this->getTableGateway()->find($id);
            $caminho = str_replace("%s", DIRECTORY_SEPARATOR, ".%smodule%s{$this->data->getAlias()}%ssrc%s{$this->data->getAlias()}%sFactory%s{$this->data->getArquivo()}.php");
            if (file_exists($caminho)) {
                $factory = file_get_contents($caminho);
                $this->error = "ARQUIVO FACTORY MODEL {$this->data->getArquivo()} JA EXISTE E PODE SER EDITADO!";
            } else {
                $factoryG = new \ZenCode\Services\GerarFactoryModel($this->data, $this->getServiceLocator());
                $factory = $factoryG->generateClass();
                $this->error = "ARQUIVO FACTORY MODEL {$this->data->getArquivo()} GERADO COM SUCESSO!";
            }
            $this->action = sprintf("%s%s", $this->data->getArquivo(), "Factory");
            $this->result = TRUE;
            $this->classe = "trigger_success";
            return new JsonModel(array('result' => $this->result, 'action' => $this->action, 'codigo' => $this->codigo, 'class' => $this->classe,
                'msg' => $this->error, 'data' => $factory, 'caminho' => $caminho, 'id' => $id));
        endif;
        $view = new ViewModel(array(
            'route' => $this->route,
            'controller' => $this->controller,
            'action' => 'index'));
        $view->setTemplate('/admin/admin/deny');
        return $view;
    }

    public function gerartablefactoryAction() {
        $id = $this->params()->fromRoute('id', 0);
        if ((int) $id):
            $this->data = $this->getTableGateway()->find($id);
            $caminho = str_replace("%s", DIRECTORY_SEPARATOR, ".%smodule%s{$this->data->getAlias()}%ssrc%s{$this->data->getAlias()}%sFactory%s{$this->data->getArquivo()}Table.php");
            if (file_exists($caminho)) {
                $factory = file_get_contents($caminho);
                $this->error = "ARQUIVO FACTORY TABLE {$this->data->getArquivo()} JA EXISTE E PODE SER EDITADO!";
            } else {
                $factoryG = new \ZenCode\Services\GerarFactoryTable($this->data, $this->getServiceLocator());
                $factory = $factoryG->generateClass();
                $this->error = "ARQUIVO FACTORY TABLE {$this->data->getArquivo()} GERADO COM SUCESSO!";
            }
            $this->action = sprintf("%s%s", $this->data->getArquivo(), "Factory Table");
            $this->result = TRUE;
            $this->classe = "trigger_success";
            return new JsonModel(array('result' => $this->result, 'action' => $this->action, 'codigo' => $this->codigo, 'class' => $this->classe,
                'msg' => $this->error, 'data' => $factory, 'caminho' => $caminho, 'id' => $id));
        endif;
        $view = new ViewModel(array(
            'route' => $this->route,
            'controller' => $this->controller,
            'action' => 'index'));
        $view->setTemplate('/admin/admin/deny');
        return $view;
    }

    public function gerarmoduleAction() {
        $id = $this->params()->fromRoute('id', 0);
        if ((int) $id):
            $this->data = $this->getTableGateway()->find($id);
            $caminho = str_replace("%s", DIRECTORY_SEPARATOR, ".%smodule%s{$this->data->getAlias()}%sModule.php");
            if (file_exists($caminho)) {
                $smodule = file_get_contents($caminho);
                $this->error = "ARQUIVO MODULE {$this->data->getArquivo()} JA EXISTE E PODE SER EDITADO!";
            } else {
                $smoduleG = new \ZenCode\Services\GerarModule($this->data, $this->getServiceLocator());
                $smodule = $controllerG->generateClass();
                $this->error = "ARQUIVO MODULE {$this->data->getArquivo()} GERADO COM SUCESSO!";
            }
            $this->action = sprintf("%s", "Module");
            $this->result = TRUE;
            $this->classe = "trigger_success";
            return new JsonModel(array('result' => $this->result, 'action' => $this->action, 'codigo' => $this->codigo, 'class' => $this->classe,
                'msg' => $this->error, 'data' => $smodule, 'caminho' => $caminho, 'id' => $id));
        endif;
    }

    public function gerarmoduleconfigAction() {
        $id = $this->params()->fromRoute('id', 0);
        if ((int) $id):
            $this->data = $this->getTableGateway()->find($id);
            $t = date("YmdHis");
            $caminho = str_replace("%s", DIRECTORY_SEPARATOR, ".%smodule%s{$this->data->getAlias()}%sconfig%smodule.config.php");
            if (file_exists($caminho)) {
                $moduleconfig = file_get_contents($caminho);
                $this->error = "ARQUIVO MODULE CONFIG {$this->data->getArquivo()} JA EXISTE E PODE SER EDITADO!";
            } else {
                $childrenModules = $this->getTableGateway()->findBy(['alias' => $this->data->getAlias()]);
                $moduleconfigG = new \ZenCode\Services\GerarModuleConfig($this->data, $childrenModules, $this->getServiceLocator());
                $moduleconfig = $moduleconfigG->generateFile(['caminho' => $caminho, 'description' => $moduleconfigG->getCode()]);
                $this->error = "ARQUIVO MODULE CONFIG {$this->data->getArquivo()} GERADO COM SUCESSO!";
            }
            $this->action = sprintf("%s", "module.config");
            $this->result = TRUE;
            $this->classe = "trigger_success";
            return new JsonModel(array('result' => $this->result, 'action' => $this->action, 'codigo' => $this->codigo, 'class' => $this->classe,
                'msg' => $this->error, 'data' => $moduleconfig, 'caminho' => $caminho, 'id' => $id));
        endif;
    }

    public function gerarviewAction() {
        $tplview = "Nada Foi Encotrado";
        $id = $this->params()->fromRoute('id', 0);
        $view = $this->params()->fromQuery("view", '0');
        if ((int) $id):
            $this->data = $this->getTableGateway()->find($id);
            if ($view === '0'):
                $caminho = str_replace("%s", DIRECTORY_SEPARATOR, ".%smodule%sAdmin%sview%sadmin%sadmin%stpl%s{$this->data->getController()}.phtml");
                if (!file_exists($caminho)):
                    $this->form = "{$this->data->getAlias()}\\Form\\{$this->data->getArquivo()}Form";
                    $tplviewG = new \ZenCode\Services\GerarView($this->getServiceLocator());
                    $this->form = $this->getForm();
                    $tplviewG->GerarElement($this->form, $this->url()->fromRoute(sprintf("%s/default", $this->data->getRoute()), array('controller' => $this->data->getController(), 'action' => "index")));
                    $this->createview($caminho,$tplviewG->formGrupo(),"{$this->data->getController()}");
                endif;

            else:
                $caminho = str_replace("%s", DIRECTORY_SEPARATOR, ".%smodule%sAdmin%sview%sadmin%sadmin%stpl%s{$this->data->getController()}%s{$view}.phtml");
                if (!file_exists($caminho)):
                    if ($view == "index"):
                        $tplviewG = new \ZenCode\Services\GerarView($this->getServiceLocator());
                        $this->createview($caminho,$tplviewG->GerarListagem($this->data),"{$this->data->getController()}-{$view}");
                    else:
                        $this->classe = "trigger_success";
                        $this->error = "ARQUIVO  {$this->data->getController()}-{$view}} JA EXISTE E PODE SER EDITADO!";
                        $this->form = "{$this->data->getAlias()}\\Form\\{$this->data->getArquivo()}Form";
                        $tplviewG = new \ZenCode\Services\GerarView($this->getServiceLocator());
                        $this->form = $this->getForm();
                        $tplviewG->GerarElement($this->form, $this->url()->fromRoute(sprintf("%s/default", $this->data->getRoute()), array('controller' => $this->data->getController(), 'action' => "index")));
                        file_put_contents($caminho, $tplviewG->formGrupo());
                    endif;

                endif;
                file_get_contents($caminho);
            endif;
            $tplview = file_get_contents($caminho);
            $this->action = sprintf("%s%s", $this->data->getController(), "View");
            $this->result = TRUE;
            return new JsonModel(array('result' => $this->result, 'action' => $this->action, 'codigo' => $this->codigo, 'class' => $this->classe,
                'msg' => $this->error, 'data' => $tplview, 'caminho' => $caminho, 'id' => $id));
        endif;
    }

    protected function createview($caminho,$texto,$arquivo)
    {
        $fp = fopen($caminho , "w");
        $fw = fwrite($fp,  $texto);
        #Verificar se o arquivo foi salvo.
        if($fw == strlen($texto)):
        $this->classe = "trigger_success";
        $this->error = "ARQUIVO  {$arquivo} PODE SER EDITADO!";
        else:
        $this->classe="trigger_error";
        $this->error = "ERRO AO GERAR O ARQUIVO  {$arquivo} PODE SER EDITADO!";
        endif;
    }

    public function testeAction() {
        $this->data = $this->getTableGateway()->find("13");
        $tplviewG = new \ZenCode\Services\GerarView($this->getServiceLocator());
        $caminho = str_replace("%s", DIRECTORY_SEPARATOR, ".%smodule%sAdmin%sview%sadmin%sadmin%stpl%s{$this->data->getController()}-index.phtml");
        file_put_contents($caminho, $tplviewG->GerarListagem($this->data));
        var_dump($tplviewG->GerarListagem($this->data));
        die();
    }

    public function gerarnavigationAction() {

        $caminho = str_replace("%s", DIRECTORY_SEPARATOR, ".%sconfig%sautoload%snavigation.admin.php");
        $navigationG = new \ZenCode\Services\GerarNavigation($this->getServiceLocator());
        $navigation = $navigationG->generate($caminho);
        $this->error = "ARQUIVO DE NAVEGAÇÃO FOI GERADO COM SUCESSO!";
        $this->action = sprintf("%s", "navigation");
        $this->result = TRUE;
        $this->classe = "trigger_success";
        return new JsonModel(array('result' => $this->result, 'action' => $this->action, 'codigo' => $this->codigo, 'class' => $this->classe,
            'msg' => $this->error, 'data' => $navigation, 'caminho' => "Não a restauração para este arquivo", 'id' => "0"));
    }

    public function gerartradutorAction() {
        $language = $this->getServiceLocator()->get("Operacional\Model\BsTradutorTable")->findBy(array('state' => '0'));
        $caminho = str_replace("%s", DIRECTORY_SEPARATOR, ".%smodule%sBase%slanguage%spt_BR.php");
        $tradutorG = new \ZenCode\Services\GerarTradutor($language);
        $tradutor = $tradutorG->generate($caminho);
        $this->error = "ARQUIVO DE TADUÇÂO FOI GERADO COM SUCESSO, ATUALIZE A PAGINA PARA VER O RESULTADO!";
        $this->action = sprintf("%s", "tradutor");
        $this->result = TRUE;
        $this->classe = "trigger_success";
        return new JsonModel(array('result' => $this->result, 'action' => $this->action, 'codigo' => $this->codigo, 'class' => $this->classe,
            'msg' => $this->error, 'data' => $tradutor, 'caminho' => "Não a restauração para este arquivo", 'id' => "0"));
    }

    public function updateAction() {

        if ($this->params()->fromPost()):
            $zencode = new \ZenCode\Services\Options();
            $data['description'] = trim($this->params()->fromPost('description'));
            $data['caminho'] = trim($this->params()->fromPost('caminho'));
            $pos = strlen($data['caminho']) - 4;
            if (substr($data['caminho'], $pos) === "phtml" || substr($data['caminho'], $pos) === "html") {
                file_put_contents($data['caminho'], $data['description']);
            } else {
                $zencode->generateFile($data);
            }

            $this->result = TRUE;
            $this->error = "ARQUIVO {$this->params()->fromPost('caminho')} ATUALIZADO COM SUCESSO!";
            $this->classe = "trigger_success";
            return new JsonModel(array('result' => $this->result, 'action' => $this->action, 'codigo' => $this->codigo, 'class' => $this->classe,
                'msg' => $this->error));
        endif;
        $view = new ViewModel(array(
            'route' => $this->route,
            'controller' => $this->controller,
            'action' => 'index'));
        $view->setTemplate('/admin/admin/deny');
        return $view;
    }

    public function refreshAction() {
        if ($this->params()->fromPost()):
            $data = $this->params()->fromPost();
            extract($data);
            if (file_exists($caminho)) {
                unlink($caminho);
                $this->error = "ARQUIVO {$caminho} EXCLUIDO!";
                $this->result = TRUE;
                $this->classe = "trigger_success";
                $this->action = "#btn btn-green";
            } else {
                $this->error = "ARQUIVO {$caminho} NÂO FOI ENCONTRADO!";
                $this->result = FALSE;
                $this->classe = "trigger_error";
                $this->action = "not_class";
            }
            return new JsonModel(array('result' => $this->result, 'action' => $this->action, 'codigo' => $this->codigo, 'class' => $this->classe,
                'msg' => $this->error, 'data' => $data));
        endif;
        $view = new ViewModel(array(
            'route' => $this->route,
            'controller' => $this->controller,
            'action' => 'index'));
        $view->setTemplate('/admin/admin/deny');
        return $view;
    }

}
