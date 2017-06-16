<?php

namespace DevmonkHtmlpurifier;

use Zend\EventManager\EventInterface;

class Module
{
    const SERVICE_NAME            = 'purifier';
    const CONFIG_KEY_HTMLPURIFIER = 'devmonkhtmlpurifier';
    const CONFIG_KEY_CONFIG       = 'config';
    
    /**
     * {@inheritDoc}
     */
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }
}
