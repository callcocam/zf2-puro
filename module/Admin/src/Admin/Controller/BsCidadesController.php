<?php

/**
 * Class [TIPO]
 */

namespace Admin\Controller;

use Base\Controller\AbstractController;

/**
 * Description of BsCidadesController
 *
 * @author Claudio
 * @copyright (c) 2016, Claudio Campos
 */
class BsCidadesController extends AbstractController {

    public function __construct() {
        $this->route = "admin/default";
        $this->controller = "bs-cidades";
        $this->action = "index";
        $this->form = "Admin\Form\BsCidadesForm";
        $this->model = "Admin\Model\BsCidades";
        $this->table = "Admin\Model\BsCidadesTable";
        $this->template="admin/admin/listar";
    }

}
