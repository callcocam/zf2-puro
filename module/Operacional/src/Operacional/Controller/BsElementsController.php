<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Operacional\Controller;

use Base\Controller\AbstractController;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class BsElementsController extends AbstractController
{

    /**
     * construct do Table
     *
     * @return Base\Controller\AbstractController
     */
    public function __construct()
    {
        // Configurações iniciais do Controller
        $this->route = "admin/default";
        $this->controller = "bs-elements";
        $this->action = "";
        $this->model = "Operacional\Model\BsElements";
        $this->table = "Operacional\Model\BsElementsTable";
        $this->template = "/admin/admin/listar";
    }


}