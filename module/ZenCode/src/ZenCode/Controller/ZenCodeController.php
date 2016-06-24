<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/calcocam for the canonical source repository
 * @copyright Copyright (c) 2005-2016 SIGA-Smart. (http://www.sigasmart.com.br)
 */

namespace ZenCode\Controller;

use Zend\View\Model\JsonModel;

/**
 * Description of ZenCodeController
 *
 * @author Call
 */
class ZenCodeController extends \Base\Controller\AbstractController {

    public function __construct() {
        $this->route = "zen-code/default";
        $this->controller = "zen-code";
        $this->action = "index";
        $this->model = "ZenCode\Model\BsResources";
        $this->table = "ZenCode\Model\BsResourcesTable";
        $this->template = "/zen-code/zen-code/index";
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
             $caminho = str_replace("%s",DIRECTORY_SEPARATOR, ".%smodule%s{$this->data->getAlias()}%ssrc%s{$this->data->getAlias()}%sModel%s{$this->data->getArquivo()}.php");
            if (file_exists($caminho)) {
                 $model = file_get_contents($caminho);
                 $this->error = "ARQUIVO MODEL {$this->data->getArquivo()} JA EXISTE E PODE SER EDITADO!";
            } else {
               $modeG = new \ZenCode\Services\GerarModel($this->data, $this->getServiceLocator());
               $model = $modeG->generateClass();
               $this->error = "ARQUIVO MODEL {$this->data->getArquivo()} GERADO COM SUCESSO!";
            }
             $this->action=$this->data->getArquivo();
             $this->result = TRUE;
             $this->classe = "trigger_success";
        endif;
        return new JsonModel(array('result' => $this->result, 'action' => $this->action, 'codigo' => $this->codigo, 'class' => $this->classe,
            'msg' => $this->error,'data'=>$model,'caminho'=>$caminho,'id'=>$id));
    }

    public function gerartableAction() {
        $id = $this->params()->fromRoute('id', 0);
        if ((int) $id):
            $this->data = $this->getTableGateway()->find($id);
            $caminho = str_replace("%s",DIRECTORY_SEPARATOR, ".%smodule%s{$this->data->getAlias()}%ssrc%s{$this->data->getAlias()}%sModel%s{$this->data->getArquivo()}Table.php");
            if (file_exists($caminho)) {
                $table = file_get_contents($caminho);
                 $this->error = "ARQUIVO TABLE {$this->data->getArquivo()} JA EXISTE E PODE SER EDITADO!";
            } else {
               $tableG = new \ZenCode\Services\GerarTable($this->data, $this->getServiceLocator());
               $table = $tableG->generateClass();
               $this->error = "ARQUIVO TABLE {$this->data->getArquivo()} GERADO COM SUCESSO!";
            }
            $this->action=sprintf("%s%s",$this->data->getArquivo(),"Table");            
            $this->result = TRUE;
            $this->classe = "trigger_success";
        endif;
        return new JsonModel(array('result' => $this->result, 'action' => $this->action, 'codigo' => $this->codigo, 'class' => $this->classe,
            'msg' => $this->error,'data'=>$table,'caminho'=>$caminho,'id'=>$id));
    }

    public function gerarformAction() {
        $id = $this->params()->fromRoute('id', 0);
        if ((int) $id):
            $this->data = $this->getTableGateway()->find($id);
            $caminho = str_replace("%s",DIRECTORY_SEPARATOR, ".%smodule%s{$this->data->getAlias()}%ssrc%s{$this->data->getAlias()}%sForm%s{$this->data->getArquivo()}Form.php");
            if (file_exists($caminho)) {
                $form = file_get_contents($caminho);
                 $this->error = "ARQUIVO FORM {$this->data->getArquivo()} JA EXISTE E PODE SER EDITADO!";
            } else {
               $formG = new \ZenCode\Services\GerarForm($this->data, $this->getServiceLocator());
               $form = $formG->generateClass();
            }
            $this->action=sprintf("%s%s",$this->data->getArquivo(),"Form"); 
            $this->result = TRUE;
            $this->error = "ARQUIVO FORM {$this->data->getArquivo()} GERADO COM SUCESSO!";
            $this->classe = "trigger_success";
        endif;
        return new JsonModel(array('result' => $this->result, 'action' => $this->action, 'codigo' => $this->codigo, 'class' => $this->classe,
            'msg' => $this->error,'data'=>$form,'caminho'=>$caminho,'id'=>$id));
    }
    
    public function gerarfilterAction() {
        $id = $this->params()->fromRoute('id', 0);
        if ((int) $id):
            $this->data = $this->getTableGateway()->find($id);
            $caminho = str_replace("%s",DIRECTORY_SEPARATOR, ".%smodule%s{$this->data->getAlias()}%ssrc%s{$this->data->getAlias()}%sForm%s{$this->data->getArquivo()}Filter.php");
            if (file_exists($caminho)) {
                $filter = file_get_contents($caminho);
                 $this->error = "ARQUIVO FILTER {$this->data->getArquivo()} JA EXISTE E PODE SER EDITADO!";
            } else {
                $filterG = new \ZenCode\Services\GerarFilter($this->data, $this->getServiceLocator());
                $filter = $filterG->generateClass();
                $this->error = "ARQUIVO FILTER {$this->data->getArquivo()} GERADO COM SUCESSO!";
            }
            $this->action=sprintf("%s%s",$this->data->getArquivo(),"Filter");
            $this->result = TRUE;
            $this->classe = "trigger_success";
         endif;
        return new JsonModel(array('result' => $this->result, 'action' => $this->action, 'codigo' => $this->codigo, 'class' => $this->classe,
            'msg' => $this->error,'data'=>$filter,'caminho'=>$caminho,'id'=>$id));
    }

    public function gerarcontrollerAction() {
        $id = $this->params()->fromRoute('id', 0);
        if ((int) $id):
            $this->data = $this->getTableGateway()->find($id);
            $caminho = str_replace("%s",DIRECTORY_SEPARATOR, ".%smodule%s{$this->data->getAlias()}%ssrc%s{$this->data->getAlias()}%sController%s{$this->data->getArquivo()}Controller.php");
            if (file_exists($caminho)) {
                $controller = file_get_contents($caminho);
                 $this->error = "ARQUIVO CONTROLLER {$this->data->getArquivo()} JA EXISTE E PODE SER EDITADO!";
            } else {
                $controllerG = new \ZenCode\Services\GerarController($this->data, $this->getServiceLocator());
                $controller = $controllerG->generateClass();
                $this->error = "ARQUIVO CONTROLLER {$this->data->getArquivo()} GERADO COM SUCESSO!";
            }
            $this->action=sprintf("%s%s",$this->data->getArquivo(),"Controller");
            $this->result = TRUE;
            $this->classe = "trigger_success";
         endif;
        return new JsonModel(array('result' => $this->result, 'action' => $this->action, 'codigo' => $this->codigo, 'class' => $this->classe,
            'msg' => $this->error,'data'=>$controller,'caminho'=>$caminho,'id'=>$id));
    }


    public function updateAction() {

        if ($this->params()->fromPost()):
            $zencode = new \ZenCode\Services\Options();
            $data['description']=trim($this->params()->fromPost('description'));
            $data['caminho']=trim($this->params()->fromPost('caminho'));
            $zencode->generateFile($data);
            $this->result = TRUE;
            $this->error = "ARQUIVO {$this->params()->fromPost('caminho')} ATUALIZADO COM SUCESSO!";
            $this->classe = "trigger_success";
        endif;
        return new JsonModel(array('result' => $this->result, 'action' => $this->action, 'codigo' => $this->codigo, 'class' => $this->classe,
            'msg' => $this->error));
    }

    public function refreshAction()
    {
         if ($this->params()->fromPost()):
            $data=$this->params()->fromPost();
            extract($data);
            if (file_exists($caminho)) {
                unlink($caminho);
                $this->error = "ARQUIVO {$caminho} EXCLUIDO!";
                $this->result = TRUE;
                $this->classe = "trigger_success";
                $this->action="#class";
            } else {
                $this->error = "ARQUIVO {$caminho} NÂO FOI ENCONTRADO!";
                $this->result = FALSE;
                $this->classe = "trigger_error";
                $this->action="not_class";
            }
        endif;
        return new JsonModel(array('result' => $this->result, 'action' => $this->action, 'codigo' => $this->codigo, 'class' => $this->classe,
            'msg' => $this->error,'data'=>$data));
    }

}
