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
            $tableG = new \ZenCode\Services\GerarTable($this->data, $this->getServiceLocator());
            $formG = new \ZenCode\Services\GerarForm($this->data, $this->getServiceLocator());
        endif;
        return new JsonModel(array('result' => $this->result, 'acao' => $this->acao, 'codigo' => $this->codigo, 'class' => $this->classe,
            'msg' => $this->error));
    }

}
