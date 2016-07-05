<?php

namespace Base\Listener;

use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\MvcEvent;

/**
 * BsImages [TIPO]
 *
 * @copyright (c) year, Claudio Coelho
 */
class LogListener implements ListenerAggregateInterface {

    protected $finishLog;

    public function attach(EventManagerInterface $events) {
        $this->listeners[] = $events->attach(MvcEvent::EVENT_DISPATCH_ERROR, array(
            $this,
            'error'
        ));

        $this->listeners[] = $events->attach(MvcEvent::EVENT_FINISH, array(
            $this,
            'finish'
        ));
    }

    public function detach(EventManagerInterface $events) {
        
    }

    public function error(MvcEvent $event) {
        $exception = $event->getResult()->exception;
        if ($exception) {
            $sm = $event->getApplication()->getServiceManager();
            $serviceLog = $sm->get('log-errorhandling');
            $serviceLog->logException($exception);
        }

        $this->finishLog = false;
    }

    public function finish(MvcEvent $event) {
        if ($this->finishLog) {
            $result = $event->getResult();
            $events = method_exists($result, 'getVariables') ? $result->getVariables() : false;
            $exception = isset($events['exception']) ? $events['exception'] : false;
            if ($exception) {
                $sm = $event->getApplication()->getServiceManager();
                $serviceLog = $sm->get('log-errorhandling');
                $serviceLog->logException($exception);
            }
        }
    }

}
