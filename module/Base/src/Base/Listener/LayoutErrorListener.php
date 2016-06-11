<?php

namespace Base\Listener;

use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\MvcEvent;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LayoutErrorListener
 *
 * @author claudio
 */
class LayoutErrorListener implements ListenerAggregateInterface {

     /**
     *
     * @var array
     */
    protected $listeners = array();
    
    /*
     * (non-PHPdoc) @see \Zend\EventManager\ListenerAggregateInterface::attach()
     */
    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->attach(MvcEvent::EVENT_RENDER, array(
            $this,
            'onRender'
        ), - 9400);
    }
    
    /*
     * (non-PHPdoc) @see \Zend\EventManager\ListenerAggregateInterface::detach()
     */
    public function detach(EventManagerInterface $events)
    {
        foreach ($this->listeners as $index => $listener) {
            if ($events->detach($listener)) {
                unset($this->listeners[$index]);
            }
        }
    }

    /**
     * MvcEvent::EVENT_RENDER event callback
     *
     * @param MvcEvent $event            
     */
    public function onRender(MvcEvent $event)
    {
         $statusCode = $event->getResponse()->getStatusCode();
         if ($statusCode == 404 || $statusCode == 500) {
            $viewModel = $event->getViewModel();
            $viewModel->setTemplate('layout/error');
          }
    }
    
}

