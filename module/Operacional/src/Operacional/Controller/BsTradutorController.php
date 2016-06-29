<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/calcocam for the canonical source repository
 * @copyright Copyright (c) 2005-2016 SIGA-Smart. (http://www.sigasmart.com.br)
 */
namespace Operacional\Controller;

/**
 * Description of BsTradutorController
 *
 * @author Call
 */
class BsTradutorController extends \Base\Controller\AbstractController {

    public function __construct() {
        $this->route = "operacional/default";
        $this->controller = "bs-tradutor";
        $this->action = "index";
        $this->model = "Operacional\Model\BsTradutor";
        $this->table = "Operacional\Model\BsTradutorTable";
        $this->form="Operacional\Form\BsTradutorForm";
        $this->template = "/admin/admin/listar";
    }

}