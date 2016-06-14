<?php
namespace Admin\Controller;
/**
 * Class [TIPO]
 */
use Base\Controller\AbstractController;

/**
 * Description of BsResourcesController
 *
 * @author Claudio
 * @copyright (c) 2016, Claudio Campos
 */
class BsResourcesController extends AbstractController {

    public function __construct() {
        $this->route = "admin/default";
        $this->controller = "bs-resources";
        $this->action = "index";
        $this->form = "Admin\Form\BsResourcesForm";
        $this->model = "Admin\Model\BsResources";
        $this->table = "Admin\Model\BsResourcesTable";
        $this->template="admin/admin/resources";
    }
//    public function indexAction() {
//        $table=new \Base\MetaData\Table($this->getAdapter());
//        $table->setColumns('bs_resources');
//        var_dump($table->getTablenames());die;
//        return parent::indexAction();
//    }
    public function editarAction() {
        $this->exclude['controller'] = array("id" => "<>");
        $this->NoRecordExist['controller'] = $this->setNoRecordExists('bs_resources', 'controller');
        return parent::editarAction();
    }
    public function inserirAction() {
        $this->NoRecordExist['controller'] = $this->setNoRecordExists('bs_resources', 'controller');
        return parent::inserirAction();
    }

}
