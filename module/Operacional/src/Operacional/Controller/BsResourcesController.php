<?php
namespace Operacional\Controller;
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
        $this->route = "operacional/default";
        $this->controller = "bs-resources";
        $this->action = "index";
        $this->form = "Operacional\Form\BsResourcesForm";
        $this->model = "Operacional\Model\BsResources";
        $this->table = "Operacional\Model\BsResourcesTable";
        $this->template="admin/admin/listar";
    }
}
