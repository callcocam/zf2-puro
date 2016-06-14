<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonAdmin for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin\Controller;

use Base\Controller\AbstractController;
use Zend\View\Model\JsonModel;

class AdminController extends AbstractController {

    public function __construct() {
        $this->route = "admin/default";
        $this->controller = "admin";
        $this->action = "index";
    }

    //########### BLOCO DE GERAÇÃO DE TABELAS E EXECUÇÃO DE CODIGO SQL #############
    public function gerartabelaAction() {
        $result = array('msg' => "Falha ao executar a função SQL");
        $request = $this->getRequest();
        if ($request->isPost()) {
            $data = array_merge_recursive($request->getPost()->toArray(), $request->getFiles()->toArray());
            try {
                $this->getEm()->getConnection()->query($data['input-sql']);
                $result = array('msg' => "Query executada com sucesso!", 'class' => 'trigger_success');
            } catch (\Exception $exc) {
                $result = array('msg' => $exc->getTraceAsString(), 'class' => 'trigger_error');
            }
        }
        return new JsonModel($result);
    }

    public function getsqlAction() {
        $result = array('class' => "trigger_error", 'attachment' => 'Falha ao executar a função SQL', 'msg' => "Falha ao executar a função SQL");
        $request = $this->getRequest();
        if ($request->isPost()) {
            $result = array_merge_recursive($request->getPost()->toArray(), $request->getFiles()->toArray());
            $check = filesize($result["attachment"]["tmp_name"]);

            if ($check !== false) {
                $result["sql"] = file_get_contents($result["attachment"]["tmp_name"]);
            }
        }

        return new JsonModel($result);
    }

}
