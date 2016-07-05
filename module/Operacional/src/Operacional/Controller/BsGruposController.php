<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/calcocam for the canonical source repository
 * @copyright Copyright (c) 2005-2016 SIGA-Smart. (http://www.sigasmart.com.br)
 */
namespace Operacional\Controller;

/**
 * Description of BsGruposController
 *
 * @author Call
 */
class BsGruposController extends \Base\Controller\AbstractController {

    public function __construct() {
        $this->route = "operacional/default";
        $this->controller = "bs-grupos";
        $this->action = "index";
        $this->model = "Operacional\Model\BsGrupos";
        $this->table = "Operacional\Model\BsGruposTable";
        $this->form = "Operacional\Form\BsGruposForm";
        $this->template = "/admin/admin/listar";
    }

}