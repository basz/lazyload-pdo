<?php

use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Expressive\ZendView\HelperPluginManagerFactory;
use Zend\Expressive\ZendView\ZendViewRendererFactory;
use Zend\View\HelperPluginManager;

return [
    'dependencies' => [
        'factories' => [
            TemplateRendererInterface::class => ZendViewRendererFactory::class,
            HelperPluginManager::class       => HelperPluginManagerFactory::class,
        ],
    ],

    'templates' => [
        'layout' => 'layout::default',
        'map'    => [
            'layout::default' => 'templates/app/layout/layout.phtml',
            'error::error'    => 'templates/error/error.phtml',
            'error::404'      => 'templates/error/404.phtml',
        ],
    ],

    'view_helpers' => [
        // zend-servicemanager-style configuration for adding view helpers:
        // - 'aliases'
        // - 'invokables'
        // - 'factories'
        // - 'abstract_factories'
        // - etc.
    ],
];
