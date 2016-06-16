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
        $this->template="admin/admin/listar";
    }
   public function indexAction() {
      //Check that the email address exists in the database
        // $validator = new \Zend\Validator\Db\RecordExists(
        //     array(
        //         'table'   => 'bs_resources',
        //         'field'   => 'controller',
        //         'adapter' => $this->getAdapter(),
        //        // 'exclude'=>array('field' =>'id','value'=>'3')
        //     )
        // );

        // if ($validator->isValid('bs-banner')) {
        //   echo $validator->isValid('bs-banner');
        // } else {
        //     // email address is invalid; print the reasons
        //     foreach ($validator->getMessages() as $message) {
        //         echo "$message\n";
        //     }
        // }die;

       return parent::indexAction();
   }
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
