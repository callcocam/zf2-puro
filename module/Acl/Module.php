<?php

namespace Acl;

use Zend\Db\TableGateway\TableGateway;

/**
 * Class [TIPO]
 */

/**
 * Description of Module
 *
 * @author Claudio
 * @copyright (c) year, Claudio Campos
 */
class Module {

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(

            'factories'=>array(
                'Acl\Model\BsPrivilegesTable'=>function($sm)
                    {
                        $tableGateway=$sm->get('BsPrivilegesTableGateway');
                        return new \Acl\Model\BsPrivilegesTable($tableGateway);

                    },
                'BsPrivilegesTableGateway'=>function($sm)
                    {
                      $dbAdapter=$sm->get('Zend\Db\Adapter\Adapter');
                      $resultSetPrototype=$sm->get('resultSetPrototype');
                      $resultSetPrototype->setArrayObjectPrototype(new \Acl\Model\BsPrivileges());
                      return new TableGateway('bs_privileges',$dbAdapter,null,$resultSetPrototype);
                    },
                    'Acl\Model\Resources'=>function($sm)
                    {
                        return new \Acl\Model\Resources($sm);
                    },
                    'Acl\Permissions\Acl'=>function($sm)
                        {
                            $repoResourses=$sm->get('Acl\Model\Resources');
                            $repoPrivileges=$sm->get('Acl\Model\BsPrivilegesTable');
                            $privileges=$repoPrivileges->findALL();
                            return new \Acl\Permissions\Acl($repoResourses,$privileges);
                        }
                ),
            'invokables'=>array()
            );      
    }

}
