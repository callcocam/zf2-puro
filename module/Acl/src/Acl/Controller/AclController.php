<?php

namespace Acl\Controller;

use Base\Controller\AbstractController;

/**
 * Acl Controller
 */
class AclController extends AbstractController {

    function __construct() {
        $this->route = "acl/default";
        $this->controller = "acl";
        $this->action = "index";
        $this->form = "Acl\Form\BsPrivilegesForm";
        $this->model = "Acl\Model\BsPrivileges";
        $this->table = "Acl\Model\BsPrivilegesTable";
        $this->template = "admin/admin/listar";
    }

    public function indexAction() {
//                var_dump(\Acl\Model\Roles::$ROLES);
//                $acl=$this->getServiceLocator()->get('Acl\Permissions\Acl');
//                echo $acl->isAllowed('4', 'Acl\Controller\Acl', $this->params()->fromRoute('action','index'));
//                die();
        return parent::indexAction();
    }

    public function editarAction() {
        $this->exclude['resource_id'] = array("title" => "=", "AND" => "AND", "id" => "<>");
        $this->NoRecordExist['resource_id'] = $this->setNoRecordExists('bs_privileges', 'resource_id');
        return parent::editarAction();
    }

    public function inserirAction() {
        $this->exclude['resource_id'] = "title";
        $this->NoRecordExist['resource_id'] = $this->setNoRecordExists('bs_privileges', 'resource_id');
        return parent::inserirAction();
    }

    public function testeAction() {
        var_dump(\Acl\Model\Roles::$ROLES);
        $role= (string)$this->params()->fromRoute('id', 1);
        $acl = $this->getServiceLocator()->get('Acl\Permissions\Acl');
        $md='Admin\Controller\Admin';
        $action='editar';
        $acesso= $acl->isAllowed($role, $md, $action)?"Tem":"Não Tem";
        
        die(sprintf("O %s %s Permissão de Acesso ao Modulo %s Na Action %s",\Acl\Model\Roles::$ROLES[$role],$acesso,$md,$action));
        //Check that the email address exists in the database
        $validator = new \Zend\Validator\Db\NoRecordExists(array(
            'table' => 'bs_privileges',
            'field' => 'resource_id',
            'adapter' => $this->getAdapter()
        ));
        $exclude = "title='editar' AND id<>17";
        $validator->setExclude($exclude);


        // $validator->setMessage("Nenhum registro correspondente a entrada foi encontrado", 'noRecordFound');
        // $validator->setMessage("Registro Existe", 'recordFound');
        if ($validator->isValid('Acl\Controller\Acl')) {
            echo $validator->isValid('Acl\Controller\Acl');
        } else {
            foreach ($validator->getMessages() as $message) {
                echo "$message\n";
            }
        }
        die();
    }

}
