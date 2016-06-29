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
class CompaniesListener implements ListenerAggregateInterface {

    public function attach(EventManagerInterface $events) {
        $this->listeners[] = $events->attach(MvcEvent::EVENT_DISPATCH, array(
            $this,
            'GetCompanies'
                ), - 9401);
    }

    public function detach(EventManagerInterface $events) {
        
    }

    public function GetCompanies(MvcEvent $event) {
        $cache = $event->getApplication()->getServiceManager()->get('Cache');
        if (!$cache->hasItem("companies")) {
            $model = $event->getApplication()->getServiceManager()->get('Operacional\Model\BsCompaniesTable');
            $companies = $model->findOneBy(array('state' => 0));
            if ($companies) {
                $cache->addItem("companies", $companies->toArray());
            }
        }
        
    }

//put your code here
}
