<?php

/**
 * Module Config
 * Call
 */
namespace Auth;

return array(
    'router' => array(
        'routes' => array(
            'auth' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/auth',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Auth\Controller',
                        'controller' => 'Login',
                        'action' => 'login',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                           'route' => '/[:controller[/:action][/:id][/:page]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Auth\Controller\Login' => 'Auth\Controller\LoginController',
            'Auth\Controller\Registration' => 'Auth\Controller\RegistrationController',
            'Auth\Controller\Admin' => 'Auth\Controller\AdminController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'service_manager' => array(
        'factories' => array(// !!! aliases not alias
            'Auth\Form\BsUsersCreateForm' => 'Auth\Factory\BsUsersCreateFormFactory',
            'Auth\Form\BsUsersUpdateForm' => 'Auth\Factory\BsUsersUpdateFormFactory',
            'Auth\Form\AuthForm' => 'Auth\Factory\AuthFormFactory',
            'Auth\Form\ForgottenPasswordForm' => 'Auth\Factory\ForgottenPasswordFormFactory',
            'Auth\Form\RegistrationForm' => 'Auth\Factory\RegistrationFormFactory',
            'Auth\Form\ProfileForm' => 'Auth\Factory\ProfileFormFactory',
            'Auth\Model\BsUsersTable' => 'Auth\Factory\BsUsersTableFactory',
            'BsUsersTableGateway' => 'Auth\Factory\BsUsersFactory',
            'Auth\Model\AuthStorage'=>'Auth\Factory\AuthStorageFactory',
            'AuthService'=>'Auth\Factory\AuthServiceFactory'

        ),
        'aliases' => array(// !!! aliases not alias
            'Zend\Authentication\AuthenticationService' => 'my_auth_service',
        ),
        'invokables' => array(
            'my_auth_service' => 'Zend\Authentication\AuthenticationService',
            'Auth\Model\BsUsers'=>'Auth\Model\BsUsers'
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
