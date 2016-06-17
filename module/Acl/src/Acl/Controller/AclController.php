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

    public function testeAction() {
//        $this->constraints = array("5" => array('_zf_bs_privileges_role', 'UNIQUE'), "6" => array('_zf_bs_privileges_resources', 'UNIQUE'));
//        $t = $this->getTableGateway()->select(array("resource_id" => 'Acl\Controller\Acl', "title" => 'index'));
//
//
//        $table = new \Base\MetaData\Table($this->getAdapter());
//        $table->setColumns('bs_privileges');
//        $ar = $table->getConstraints("pk");
//        var_dump($ar);
//        foreach ($this->constraints as $key => $value) {
//            array_push($ar, $value);
//        }
//
//        var_dump($ar);

//        var_dump(\Acl\Model\Roles::$ROLES);
//        $role= (string)$this->params()->fromRoute('id', 1);
//        $acl = $this->getServiceLocator()->get('Acl\Permissions\Acl');;
//        $md = 'Admin\Controller\Admin';
//        $action = 'editar';
//        $acesso = $acl->isAllowed($role, $md, $action) ? "Tem" : "Não Tem";

//        die(sprintf("O %s %s Permissão de Acesso ao Modulo %s Na Action %s", \Acl\Model\Roles::$ROLES[$role], $acesso, $md, $action));
        //Check that the email address exists in the database
        $validator = new \Zend\Validator\Db\NoRecordExists(array(
            'table' => 'bs_privileges',
            'field' => 'resource_id',
            'adapter' => $this->getAdapter()
        ));
        $exclude = "title='dfdss'";
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
