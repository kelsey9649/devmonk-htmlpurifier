<?php
return array(
    \DevmonkHtmlpurifier\Module::CONFIG_KEY_HTMLPURIFIER => array(
        'config' => array(
            'Cache.SerializerPath' => __DIR__ . '/../../../../data/cache/htmlpurifier',
        ),
    ),
    'service_manager' => [
        'aliases' => [
            'purifier' => \HTMLPurifier::class,
        ],
        'factories' => [
            \HTMLPurifier::class => \DevmonkHtmlpurifier\Service\HtmlPurifierFactory::class,
            'ZfcTwigEnvironment' => \DevmonkHtmlpurifier\Service\EnvironmentFactory::class,
        ]
    ],
    'view_helpers' => [
        'factories' => [
            'purify' => \DevmonkHtmlpurifier\View\Helper\PurifyFactory::class,
        ]
    ]
);