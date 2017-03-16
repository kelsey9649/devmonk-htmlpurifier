<?php

namespace DevmonkHtmlpurifier\Service;

use DevmonkHtmlpurifier\Module;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class HtmlPurifierFactory
 * @package DevmonkHtmlpurifier\Service
 */
class HtmlPurifierFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $services
     * @return \HTMLPurifier
     */
    public function createService(ServiceLocatorInterface $services)
    {
        $config = $services->get('Config');

        $purifierConfig = \HTMLPurifier_Config::createDefault();

        if (!empty($config[Module::CONFIG_KEY_HTMLPURIFIER][Module::CONFIG_KEY_CONFIG])) {

            foreach ($config[Module::CONFIG_KEY_HTMLPURIFIER][Module::CONFIG_KEY_CONFIG] as $configKey => $configValue) {

                $purifierConfig->set($configKey, $configValue);
            }
        }

        return new \HTMLPurifier($purifierConfig);
    }
}