<?php

namespace Base\Listener;

use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\MvcEvent;
/**
 * Description of LayoutListener
 *
 * @author claudio
 */
class LayoutListener implements ListenerAggregateInterface {

    /**
     *
     * @var array
     */
    protected $listeners = array();

    /*
     * (non-PHPdoc) @see \Zend\EventManager\ListenerAggregateInterface::attach()
     */

    public function attach(EventManagerInterface $events) {
        $this->listeners[] = $events->attach(MvcEvent::EVENT_DISPATCH, array(
            $this,
            'onDispatch'
                ), - 9400);
    }

    /*
     * (non-PHPdoc) @see \Zend\EventManager\ListenerAggregateInterface::detach()
     */

    public function detach(EventManagerInterface $events) {
        foreach ($this->listeners as $index => $listener) {
            if ($events->detach($listener)) {
                unset($this->listeners[$index]);
            }
        }
    }

    /**
     * MvcEvent::EVENT_DISPATCH event callback
     *
     * @param MvcEvent $event            
     */
    public function onDispatch(MvcEvent $event) {

        $config = $event->getApplication()->getServiceManager()->get('config');
        $layout_map = $config["view_manager"]["template_map"];
        $controller = $event->getTarget();

        if (!$controller) {
            $controller = $event->getRouteMatch()->getParam('controller');
        }
        //Pegar o layout pelo controller
        $controller_class = get_class($controller);
        //Pega pelo namespace
        $module_namespace = substr($controller_class, 0, strpos($controller_class, '\\'));
        $controller_class = strtolower(str_replace("\\", "_", $controller_class));
        //Pela action
        $action = $event->getRouteMatch()->getParam('action');
        //\Base\Model\Check::debug(array($layout_map,$module_namespace,$controller_class,$action),"p");

        if (array_key_exists(sprintf("%s/layout", strtolower($module_namespace)), $layout_map)) {
            $controller->layout(sprintf("%s/layout", strtolower($module_namespace)));
        }

        if (array_key_exists(sprintf("%s/layout", strtolower($controller_class)), $layout_map)) {
            $controller->layout(sprintf("%s/layout", strtolower($controller_class)));
        }

        if (array_key_exists(sprintf("%s/layout", strtolower($action)), $layout_map)) {
            $controller->layout(sprintf("%s/layout", strtolower($action)));
        }
        $id = $event->getRouteMatch()->getParam('id', null);
        if (!is_null($id)) {
            
        }
    }

}
