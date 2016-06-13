<?php

namespace Navigation;

use Zend\View\HelperPluginManager;

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

    public function getViewHelperConfig() {
        return array(
            'factories' => array(
                // This will overwrite the native navigation helper
                'navigation' => function(HelperPluginManager $pm) {
                    $sm = $pm->getServiceLocator();
                    // Setup ACL:
                     $acl = $sm->get('Acl\Permissions\Acl');
                     // Get the AuthenticationService
                    $auth = $sm->get('AuthService');
                    $role = \Acl\Model\Roles::DEFAULT_ROLE; // The default role is guest $acl
                    // With Doctrine
                    if ($auth->hasIdentity()) {
                        $user = $auth->getIdentity();
                        $role = $user['role_id']; // Use a view to get the name of the role
                    }
                   // Get an instance of the proxy helper
                    $navigation = $pm->get('Zend\View\Helper\Navigation');
                    // Store ACL and role in the proxy helper:
                    $navigation->setAcl($acl)->setRole($role); // 'member'
                    // Return the new navigation helper instance
                    return $navigation;
                },
            )
        );
    }

}
