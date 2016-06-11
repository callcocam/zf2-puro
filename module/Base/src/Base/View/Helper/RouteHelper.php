<?php

namespace Base\View\Helper;

use Zend\View\Helper\AbstractHelper;

class RouteHelper extends AbstractHelper {

    protected $sl;
    protected $rota_and_contrller_action;
    protected $route;
    protected $controller = "index";
    protected $action = "home";
    protected $id = 0;
    protected $parans = array();

    /**
     * @return mixed
     */
    public function getRotaAndContrllerAction($index = "") {
        if (empty($index)) {
            return $this->rota_and_contrller_action;
        }
        if (isset($this->rota_and_contrller_action[$index])) {
            return $this->rota_and_contrller_action[$index];
        }
        return "";
    }

    /**
     * @param mixed $rota_and_contrller_action
     */
    public function setRotaAndContrllerAction($rota_and_contrller_action) {
        $this->rota_and_contrller_action = $rota_and_contrller_action;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSl() {
        return $this->sl;
    }

    /**
     * @param mixed $sl
     */
    public function setSl($sl) {
        $this->sl = $sl;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRoute() {
        return $this->route;
    }

    /**
     * @param mixed $route
     */
    public function setRoute($route) {
        $this->route = $route;
    }

    /**
     * @return mixed
     */
    public function getController() {
        return $this->controller;
    }

    /**
     * @param mixed $controller
     */
    public function setController($controller) {
        $this->controller = $controller;
    }

    /**
     * @return mixed
     */
    public function getAction() {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action) {
        $this->action = $action;
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    function getParans() {
        return $this->parans;
    }

    function setParans($parans) {
        $this->parans = $parans;
    }

    public function __construct($sl) {
        $this->setSl($sl);
        $param = $this->getSl()->get('application')->getMvcEvent()->getRouteMatch();
        if (!is_null($param)):
            $this->setParans($param->getParams());
            $controller = $param->getParams();
            $result = array('route' => $param->getMatchedRouteName(),
                'controller' => isset($controller['__CONTROLLER__']) ? $controller['__CONTROLLER__'] : "",
                'action' => $controller['action']);
            if (isset($controller['type'])) {
                $result['type'] = $controller['type'];
            }
            $this->setRotaAndContrllerAction($result);
            if (isset($controller['__CONTROLLER__'])) {
                $this->setController($controller['__CONTROLLER__']);
            }

            $this->setRoute($param->getMatchedRouteName());

            if (isset($controller['action'])) {
                $this->setAction($this->getRotaAndContrllerAction('action'));
            }

            if (isset($controller['id'])) {
                $this->rota_and_contrller_action['id'] = $controller['id'];
                $this->setId($this->getRotaAndContrllerAction('id'));
            }
             if (isset($controller['page'])) {
                $this->rota_and_contrller_action['page'] = $controller['page'];
               
            }
        endif;
    }

    public function setInput($input_type, $input_filter, $validate = FILTER_DEFAULT) {
        if (filter_has_var($input_type, $input_filter)) {
            $this->input = filter_input($input_type, $input_filter, $validate);
        } else {
            if (isset($_SERVER[$input_filter])) {
                $this->input = filter_var($_SERVER[$input_filter], $validate);
            } else {
                $this->input = null;
            }
        }

        return $this->input;
    }

}
