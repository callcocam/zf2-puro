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

    public function gerarmodelAction() {
        $id = $this->params()->fromRoute('id', 0);
        if ((int) $id):
            $this->data = $this->getTableGateway()->find($id);
            $modeG = new \ZenCode\Services\GerarModel($this->data, $this->getServiceLocator());
            $model = $modeG->generateClass();
            $this->result = TRUE;
            $this->error = "ARQUIVO MODEL {$this->data->getArquivo()} GERADO COM SUCESSO!";
            $this->classe = "trigger_success";
        endif;
        return new JsonModel(array('result' => $this->result, 'acao' => $this->acao, 'codigo' => $this->codigo, 'class' => $this->classe,
            'msg' => $this->error));
    }

    public function gerartableAction() {
        $id = $this->params()->fromRoute('id', 0);
        if ((int) $id):
            $this->data = $this->getTableGateway()->find($id);
            $tableG = new \ZenCode\Services\GerarTable($this->data, $this->getServiceLocator());
            $table = $tableG->generateClass();
            $this->result = TRUE;
            $this->error = "ARQUIVO TABLE {$this->data->getArquivo()} GERADO COM SUCESSO!";
            $this->classe = "trigger_success";

        endif;
        return new JsonModel(array('result' => $this->result, 'acao' => $this->acao, 'codigo' => $this->codigo, 'class' => $this->classe,
            'msg' => $this->error));
    }

    public function gerarformAction() {
        $id = $this->params()->fromRoute('id', 0);
        if ((int) $id):
            $this->data = $this->getTableGateway()->find($id);
            $formG = new \ZenCode\Services\GerarForm($this->data, $this->getServiceLocator());
            $form = $formG->generateClass();
            $this->result = TRUE;
            $this->error = "ARQUIVO FORM {$this->data->getArquivo()} GERADO COM SUCESSO!";
            $this->classe = "trigger_success";
        endif;
        return new JsonModel(array('result' => $this->result, 'acao' => $this->acao, 'codigo' => $this->codigo, 'class' => $this->classe,
            'msg' => $this->error));
    }
    
    public function gerarfilterAction() {
        $id = $this->params()->fromRoute('id', 0);
        if ((int) $id):
            $this->data = $this->getTableGateway()->find($id);
            $filterG = new \ZenCode\Services\GerarFilter($this->data, $this->getServiceLocator());
            $filter = $filterG->generateClass();
            $this->result = TRUE;
            $this->error = "ARQUIVO FILTER {$this->data->getArquivo()} GERADO COM SUCESSO!";
            $this->classe = "trigger_success";
        endif;
        return new JsonModel(array('result' => $this->result, 'acao' => $this->acao, 'codigo' => $this->codigo, 'class' => $this->classe,
            'msg' => $this->error));
    }

    public function getclassAction() {
        $id = $this->params()->fromRoute('id', 0);
        $form = "";
        if ((int) $id):
            $this->data = $this->getTableGateway()->find($id);
            $caminhomodel = sprintf(".%smodule%s{$this->data->getAlias()}%ssrc%s{$this->data->getAlias()}%sModel%s{$this->data->getArquivo()}.php", DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR);
            if (file_exists($caminhomodel)) {
                $model = file_get_contents($caminhomodel);
            } else {
                $modeG = new \ZenCode\Services\GerarModel($this->data, $this->getServiceLocator());
                $model = $modeG->generateClass();
            }
            
            $caminhotable = sprintf(".%smodule%s{$this->data->getAlias()}%ssrc%s{$this->data->getAlias()}%sModel%s{$this->data->getArquivo()}Table.php", DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR);
            if (file_exists($caminhotable)) {
                $table = file_get_contents($caminhotable);
            } else {
                $tableG = new \ZenCode\Services\GerarTable($this->data, $this->getServiceLocator());
                $table = $tableG->generateClass();
            }
            
            $caminhoform = sprintf(".%smodule%s{$this->data->getAlias()}%ssrc%s{$this->data->getAlias()}%sForm%s{$this->data->getArquivo()}Form.php", DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR);
            if (file_exists($caminhoform)) {
                $form = file_get_contents($caminhoform);
            } else {
                $formG = new \ZenCode\Services\GerarForm($this->data, $this->getServiceLocator());
                $form = $formG->generateClass();
            }
            
            $caminhofilter = sprintf(".%smodule%s{$this->data->getAlias()}%ssrc%s{$this->data->getAlias()}%sForm%s{$this->data->getArquivo()}Filter.php", DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR);
            if (file_exists($caminhofilter)) {
                $filter = file_get_contents($caminhofilter);
            } else {
                $filterG = new \ZenCode\Services\GerarFilter($this->data, $this->getServiceLocator());
                $filter = $filterG->generateClass();
            }
        //
        endif;
        return new JsonModel(array('result' => $this->result, 'acao' => $this->acao, 'codigo' => $this->codigo, 'class' => $this->classe,
            'msg' => $this->error,
            'form' => $form, 'caminhoform' => $caminhoform, 
            'caminhomodel' => $caminhomodel, 'model' => $model,
            'caminhotable' => $caminhotable, 'table' => $table,
            'caminhofilter' => $caminhofilter, 'filter' => $filter,
            ));
    }

    public function updateAction() {

        if ($this->params()->fromPost()):
            $zencode = new \ZenCode\Services\Options();
            $zencode->generateFile($this->params()->fromPost());
            $this->result = TRUE;
            $this->error = "ARQUIVO {$this->params()->fromPost('caminho')} ATUALIZADO COM SUCESSO!";
            $this->classe = "trigger_success";
        endif;
        return new JsonModel(array('result' => $this->result, 'acao' => $this->acao, 'codigo' => $this->codigo, 'class' => $this->classe,
            'msg' => $this->error));
    }

}
