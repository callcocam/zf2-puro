<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonAdmin for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin\Controller;

use Base\Controller\AbstractController;
use Zend\View\Model\JsonModel;

class AdminController extends AbstractController {

    public function __construct() {
        $this->route = "admin/default";
        $this->controller = "admin";
        $this->action = "index";
    }

//    public function indexAction() {
//        $table = new \Base\MetaData\Table($this->getAdapter());
//        $table->setColumns('bs_contas_receber');
//        $constraints = $table->getConstraints('pk');
//        foreach ($constraints as $value) {
//            if (end($value) === "UNIQUE") {
//                $unique = array_filter(explode("_", reset($value)));
//                echo end($unique);
//            }
//        }
//        \Zend\Debug\Debug::dump($constraints);
//        die;
//    }

}
