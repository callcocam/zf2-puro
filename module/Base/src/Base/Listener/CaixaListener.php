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
class CaixaListener implements ListenerAggregateInterface {

    public function attach(EventManagerInterface $events) {
        $this->listeners[] = $events->attach(MvcEvent::EVENT_DISPATCH, array(
            $this,
            'GetCaixa'
                ), - 9401);
    }

    public function detach(EventManagerInterface $events) {
        
    }

    public function GetCaixa(MvcEvent $event) {
        $cache = $event->getApplication()->getServiceManager()->get('Cache');
        if (!$cache->hasItem("caixa")) {
            $model = $event->getApplication()->getServiceManager()->get('FluxoCaixa\Model\BsCaixaTable');
            $caixa = $model->findOneBy(array('state' => 0, 'created' => date("Y-m-d")));
            if ($caixa):
                $cache->addItem("caixa", $caixa->toArray());
            endif;
        }
        else {
            $caixa = $cache->getItem('caixa');
            if ($caixa['created'] != date("Y-m-d")) {
               $cache->removeItem("caixa");
            }
        }
       
    }

}
