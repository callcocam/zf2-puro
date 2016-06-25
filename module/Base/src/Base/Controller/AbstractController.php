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
    protected $constraints;
    protected $NoRecordExist = null;
    protected $RecordExist = null;
    protected $exclude = "";
    protected $result = null;
    protected $error = "MSG_NOT_INFO_LABEL";
    protected $codigo = 0;
    protected $id = 0;
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

        return $this->getServiceLocator()->get($this->form);
    }

    public function getTableGateway() {
        return $this->getServiceLocator()->get($this->table);
    }

    public function getModel() {
        return $this->getServiceLocator()->get($this->model);
    }

    public function indexAction() {

        $view = new ViewModel();
        if (!empty($this->table)):
            $page = $this->params()->fromRoute('page', 1);
            $this->data = $this->getTableGateway()->findAll();
            // set the current page to what has been passed in query string, or to 1 if none set
            $this->data->setCurrentPageNumber((int) $this->params()->fromQuery('page', 1));
            // set the number of items per page to 10
            $this->data->setItemCountPerPage(10);
            $this->data->setCurrentPageNumber($page);
        endif;
        $table = $this->getServiceLocator()->get('Table');
        $view->setVariable('table', $table);
        $view->setVariable('data', $this->data);
        $view->setVariable('route', $this->route);
        $view->setVariable('controller', $this->controller);
        $view->setVariable('user', $this->user);
        $view->setTemplate($this->template);
        return $view;
    }

    public function inserirAction() {
        $this->form = $this->getForm();
        $this->form->get('save_copy')->setAttributes(array('disabled' => 'disabled'));
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
        return new JsonModel(array('result' => $this->result, 'acao' => $this->acao, 'codigo' => $this->codigo, 'class' => $this->classe,
            'msg' => $this->error));
    }

    public function publicaAction() {
        $this->form = $this->getForm();
        if ($this->params()->fromPost()) {
            $this->data = array_merge_recursive($this->params()->fromPost(), $this->params()->fromFiles());
            $model = $this->getModel();
            $model->exchangeArray($this->data);
            $this->form->setData($this->data);
            $this->setConstraints();
            if ($this->form->isValid()) {
                if (isset($this->data['save_copy'])):
                    $this->data['id'] = 'AUTOMATICO';
                    $model->setId(null);
                endif;
                //Se exitir o campo id valido e uma edição
                if (isset($this->data['id']) && (int) $this->data['id']):
                     $this->getTableGateway()->update($model);
                else:
                     $this->getTableGateway()->insert($model);
                endif;
                if ($this->getTableGateway()->getResult()) {
                    $this->classe = 'trigger_success';
                    $this->result = $this->getTableGateway()->getResult();
                    $this->error = $this->getTableGateway()->getError();
                    $this->id = $this->getTableGateway()->getLastInsert()->getId();
                    $this->codigo = $this->getTableGateway()->getLastInsert()->getCodigo();
                } else {
                    $this->error = $this->getTableGateway()->getError();
                    $this->result = null;
                }
            } else {
                $msgs = "";
                foreach ($this->form->getMessages() as $msg):
                    $msgs.= implode("<p> ", $msg);
                endforeach;
                $this->result = null;
                $this->error = $msgs;
                $this->acao = 'save';
            }
        }
        return new JsonModel(array('result' => $this->result, 'acao' => $this->acao, 'codigo' => $this->codigo, 'id' => $this->id, 'class' => $this->classe,
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

    public function setConstraints() {

        $table = new \Base\MetaData\Table($this->getAdapter());
        $table->setColumns($this->getTableGateway()->getTable());
        $constraints = $table->getConstraints('pk');
        if ($this->constraints):
            foreach ($this->constraints as $key => $value) {
                array_push($constraints, $value);
            }
        endif;
        foreach ($constraints as $value) {
            try{
            if ($value[1] === "UNIQUE") {
                $unique = array_filter(explode("_", $value[0]));
                if (isset($unique[4])) {
                    $tabela = $this->getTableGateway()->getTable();
                    $field = $unique[4];
                    $id = $this->data['id'];
                    if (isset($this->data['save']) && (int) $id):
                        $validator = $this->setNoRecordExists($tabela, $field, array('field' => 'id', 'value' => $id));
                        $validator->setMessage("ERRO AO ATUALIZAR, O [{$this->data[$field]}] não esta cadastrado na tabela {$tabela} na coluna {$field}", 'noRecordFound');
                        $validator->setMessage("ERRO AO ATUALIZAR, O [{$this->data[$field]}] ja esta cadastrado na tabela {$tabela} na coluna {$field}", 'recordFound');
                    else:
                        $validator = $this->setNoRecordExists($tabela, $field);
                        $validator->setMessage("ERRO AO CADATSRAR, O [] não esta cadastrado na tabela {$tabela} na coluna {$field}", 'noRecordFound');
                        $validator->setMessage("ERRO AO CADATSRAR, O [] ja esta cadastrado na tabela {$tabela} na coluna {$field}", 'recordFound');
                    endif;

                    $this->form->getInputFilter()->get($field)->getValidatorChain()->attach($validator);
                }
            }
        }
        catch(\Zend\InputFilter\Exception\InvalidArgumentException $ex){

        }
        }
    }

}
