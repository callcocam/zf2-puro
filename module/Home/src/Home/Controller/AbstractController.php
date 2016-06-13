<?php
namespace Home\Controller;
/**
 * AbstractController [TIPO]
 *
 * @copyright (c) year, Claudio Coelho
 */
abstract class AbstractController extends \Zend\Mvc\Controller\AbstractActionController {
    
    abstract function __construct();
    protected $route;
    protected $controller;
    protected $action;
    public function indexAction() {
        
        
    }
}
