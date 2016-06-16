<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Base\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel,
    Zend\View\Model\JsonModel;

abstract class AbstractController extends AbstractActionController {

    protected $storage;
    protected $authservice;
    protected $user;
    protected $table;
    protected $model;
    protected $form;
    protected $data = array();
    protected $route = "admin/default";
    protected $controller = "admin";
    protected $action = "index";
    protected $template = "/admin/admin/index";
    protected $NoRecordExist = null;
    protected $RecordExist = null;
    protected $exclude = "";
    protected $result = null;
    protected $error = "MSG_NOT_INFO_LABEL";
    protected $codigo = 0;
    protected $classe = "trigger_error";
    protected $acao = "save";

    abstract function __construct();

    public function onDispatch(\Zend\Mvc\MvcEvent $e) {
        //if already login, redirect to success page
        if (!$this->getAuthService()->hasIdentity()) {
            return $this->redirect()->toRoute("auth");
        }

        if (!$this->IsAllowed($e->getRouteMatch())) {
            $this->Messages()->error('MSG_ACCESS_DENY');
            $this->template = "/admin/admin/deny";
        }
        $this->user = $this->getAuthService()->getIdentity();
        return parent::onDispatch($e);
    }

    public function getAuthService() {
        if (!$this->authservice) {
            $this->authservice = $this->getServiceLocator()->get('AuthService');
        }

        return $this->authservice;
    }

    public function getSessionStorage() {
        if (!$this->storage) {
            $this->storage = $this->getServiceLocator()->get('Auth\Model\AuthStorage');
        }
        return $this->storage;
    }

    public function getAdapter() {
        return $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
    }

    public function getForm() {
        if (!empty($this->form) && is_string($this->form)):
            return $this->getServiceLocator()->get($this->form);
        endif;
        return $this->form;
    }

    public function getTableGateway() {
        return $this->getServiceLocator()->get($this->table);
    }

    public function getModel() {
        return $this->getServiceLocator()->get($this->model);
    }

    public function indexAction() {

        if (!empty($this->table)):
            $this->data = $this->getTableGateway()->findAll();
        endif;
        $view = new ViewModel(array(
            'data' => $this->data,
            'route' => $this->route,
            'controller' => $this->controller,
            'user' => $this->user));
        $view->setTemplate($this->template);
        return $view;
    }

    public function inserirAction() {
        $this->form = $this->getForm();
        $view = new ViewModel(array(
            'data' => $this->data,
            'route' => $this->route,
            'controller' => $this->controller,
            'action' => 'publica',
            'form' => $this->form));
        $view->setTemplate('/admin/admin/inserir');
        return $view;
    }

    public function editarAction() {
        $id = $this->params()->fromRoute('id', 0);
        if (!(int) $id) {
            return $this->redirect()->toRoute($this->route, array('controller' => $this->controller, 'action' => $this->action));
        }
        $this->data = $this->getTableGateway()->find($id);
        if (!$this->data) {
            return $this->redirect()->toRoute($this->route, array('controller' => $this->controller, 'action' => $this->action));
        }
        $this->form = $this->getForm();
        $this->form->setData($this->data->toArray());
        $view = new ViewModel(array(
            'form' => $this->form,
            'route' => $this->route,
            'controller' => $this->controller,
            'action' => 'publica',
            'id' => $id));
        $view->setTemplate('/admin/admin/inserir');
        return $view;
    }

    public function excluirAction() {
        $param = $this->params()->fromRoute('id', '0');
        if ($param) {
            if ($this->getTableGateway()->delete($param)):
                $this->classe = 'trigger_success';
            endif;
            $this->result = $this->getTableGateway()->getResult();
            $this->error = $this->getTableGateway()->getError();
        }
        return new JsonModel(array('result' => $this->resutl, 'acao' => $this->acao, 'codigo' => $this->codigo, 'class' => $this->classe,
            'msg' => $this->error));
    }

    public function publicaAction() {
        $this->form = $this->getForm();
        if ($this->params()->fromPost()) {
            $this->data = array_merge_recursive($this->params()->fromPost(), $this->params()->fromFiles());
            $model = $this->getModel();
            $model->exchangeArray($this->data);
            $this->form->setData($this->data);
            $this->getValidation();
            if ($this->form->isValid()) {
                //Se exitir o campo id valido e uma edição
                $result = null;
                try {
                    if (isset($this->data['id']) && (int) $this->data['id']):
                        $result = $this->getTableGateway()->update($model);
                    else:
                        $result = $this->getTableGateway()->insert($model);
                        $this->data['id'] = $result;
                    endif;
                    if ($result) {
                        $this->classe = 'trigger_success';
                        if (isset($this->data['save_close'])):
                            $this->error = $this->getTableGateway()->getError();
                            $this->acao = 'save_close';
                        elseif (isset($this->data['save_new'])):
                            $this->error = $this->getTableGateway()->getError();
                            $this->acao = 'save_new';
                        elseif (isset($this->data['save_copy'])):
                            $this->data['id'] = 'AUTOMATICO';
                            $this->result = $this->data;
                            $this->error = $this->getTableGateway()->getError();
                            $this->acao = 'save_copy';
                        else:
                            $this->result = $this->data;
                            $this->error = $this->getTableGateway()->getError();
                        endif;
                    }
                    else {
                        $this->error = $this->getTableGateway()->getError();
                    }
                } catch (\Zend\Db\Adapter\Exception\InvalidQueryException $exc) {
                    $this->error = sprintf("ERROR: %s - %s", $exc->getCode(), $exc->getMessage());
                }
            } else {
                foreach ($this->form->getMessages() as $msg):
                    $msgs = implode(PHP_EOL, $msg);
                endforeach;
                $this->result = null;
                $this->error = $msgs;
                $this->acao = 'save';
            }
        }
        return new JsonModel(array('result' => $this->result, 'acao' => $this->acao, 'codigo' => $this->codigo, 'class' => $this->classe,
            'msg' => $this->error, 'data' => $this->data));
    }

    public function setNoRecordExists($table, $fild, $exclude = "", $recordFound = "Registro Ja Existe", $noRecordFound = "Registro Não Existe") {
        $validator = new \Zend\Validator\Db\NoRecordExists(array(
            'table' => $table,
            'field' => $fild,
            'adapter' => $this->getAdapter()
        ));

        if (!empty($exclude)):
            $validator->setExclude($exclude);
        endif;
        $validator->setMessage($noRecordFound, 'noRecordFound');
        $validator->setMessage($recordFound, 'recordFound');
        return $validator;
    }

    public function setRecordExists($table, $fild, $exclude = "", $recordFound = "Registro Ja Existe", $noRecordFound = "Registro Não Existe") {
        $validator = new \Zend\Validator\Db\RecordExists(array(
            'table' => $table,
            'field' => $fild,
            'adapter' => $this->getAdapter()
        ));

        if (!empty($exclude)):
            $validator->setExclude($exclude);
        endif;
        $validator->setMessage($noRecordFound, 'noRecordFound');
        $validator->setMessage($recordFound, 'recordFound');
        return $validator;
    }

    public function getValidation() {
        if ($this->NoRecordExist):
            foreach ($this->NoRecordExist as $key => $value):

                if (isset($this->exclude[$key])):
                    if (is_array($this->exclude[$key])) {
                        $condicao = "";
                        foreach ($this->exclude[$key] as $ek => $ev):
                            if (array_key_exists($ek, $this->data)):
                                $condicao.="{$ek}{$ev}'{$this->data[$ek]}'";
                            else:
                                $condicao.=" {$ek} ";
                            endif;

                        endforeach;
                        $value->setOptions(array('exclude' => $condicao));
                    }
                    else {
                        $value->setOptions(array('exclude' => "{$this->exclude[$key]}='{$this->data[$this->exclude[$key]]}'"));
                    }

                endif;
                $this->form->getInputFilter()->get($key)->getValidatorChain()->attach($value);
            endforeach;
        endif;
        if ($this->RecordExist):
            foreach ($this->RecordExist as $key => $value):
                if (isset($this->exclude[$key])):
                    if (is_array($this->exclude[$key])) {
                        $condicao = "";
                        foreach ($this->exclude[$key] as $ek => $ev):
                            if (array_key_exists($ek, $this->data)):
                                $condicao.="{$ek}{$ev}'{$this->data[$ek]}'";
                            else:
                                $condicao.=" {$ek} ";
                            endif;

                        endforeach;
                        $value->setOptions(array('exclude' => $condicao));
                    }
                    else {
                        $value->setOptions(array('exclude' => "{$this->exclude[$key]}='{$this->data[$this->exclude[$key]]}'"));
                    }

                endif;
                $this->form->getInputFilter()->get($key)->getValidatorChain()->attach($value);

            endforeach;
        endif;
    }

}
