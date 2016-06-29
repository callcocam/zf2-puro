<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonBase for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Base;

return array(
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'factories' => array(
            'translator' => 'Zend\Mvc\Service\TranslatorServiceFactory',
            'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
            'secondary_navigation' => 'Navigation\Navigation\Service\SecondaryNavigationFactory',
        ),
        'invokables' => array(
            'LayoutListener' => 'Base\Listener\LayoutListener',
            'LayoutErrorListener' => 'Base\Listener\LayoutErrorListener',
            'CaixaListener' => 'Base\Listener\CaixaListener',
            'CompaniesListener' => 'Base\Listener\CompaniesListener',
        ),
    ),
    'translator' => array(
        'locale' => 'pt_BR',
        'translation_file_patterns' => array(
            array(
                'type'     => 'phparray',
                'base_dir' =>  './data/languageArray',
                'pattern'  => '%s.php',
            ),
        ),
    ),
    'controller_plugins' => array(
        'invokables' => array(
            'Messages' => 'Base\Controller\Plugin\Messages',
            'CachePlugin' => 'Base\Controller\Plugin\CachePlugin',
        ),
        'factories' => array(
        )
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'home/layout' => __DIR__ . '/../view/layout/home.phtml',
            'auth/layout' => __DIR__ . '/../view/layout/home.phtml',
            'base/index/index' => __DIR__ . '/../view/base/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        "strategies" => array(
            "ViewJsonStrategy",
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
