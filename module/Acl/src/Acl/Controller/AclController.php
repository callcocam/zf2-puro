<?php 

namespace Acl\Controller;

use Base\Controller\AbstractController;
/**
* Acl Controller
*/
class AclController extends AbstractController
{
	
function __construct()
	{
	$this->route = "acl/default";
        $this->controller = "acl";
        $this->action = "index";
        $this->form = "Acl\Form\BsPrivilegesForm";
        $this->model = "Acl\Model\BsPrivileges";
        $this->table = "Acl\Model\BsPrivilegesTable";
        $this->template="admin/admin/listar";
	}


        public function indexAction()
        {
//                var_dump(\Acl\Model\Roles::$ROLES);
//                $acl=$this->getServiceLocator()->get('Acl\Permissions\Acl');
//                echo $acl->isAllowed('4', 'Acl\Controller\Acl', $this->params()->fromRoute('action','index'));
//                die();
                return parent::indexAction();
        }
         public function editarAction()
        {
                
//                $acl=$this->getServiceLocator()->get('Acl\Permissions\Acl');
//                echo $this->params()->fromRoute('action','index');
//                echo $acl->isAllowed('3', 'Acl\Controller\Acl', $this->params()->fromRoute('action','index'));
//                die();
                return parent::editarAction();
        }
       
}