<?php
/**
 * @license © 2005 - 2016 by Zend Technologies Ltd. All rights reserved.
 */


namespace Admin\Controller;

use Base\Controller\AbstractController;

/**
 * SIGA-Smart
 *
 * Esta class foi gerada via Zend\Code\Generator.
 */
class BsClientesController extends AbstractController
{

    /**
     * construct do Table
     *
     * @return Base\Controller\AbstractController
     */
    public function __construct()
    {
        // Configurações iniciais do Controller
        $this->route = "zen-code/default";
        $this->controller = "zen-code";
        $this->action = "index";
        $this->model = "ZenCode\Model\BsResources";
        $this->table = "ZenCode\Model\BsResourcesTable";
        $this->template = "/zen-code/zen-code/index";
     
    }


}

