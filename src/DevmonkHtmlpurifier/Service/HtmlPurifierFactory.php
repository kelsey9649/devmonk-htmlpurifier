<?php

namespace DevmonkHtmlpurifier\Service;

use DevmonkHtmlpurifier\Module;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
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
        return $this->__invoke($services, \HTMLPurifier::class);
    }

    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return \HTMLPurifier
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     * @throws ContainerException if any other error occurs
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('Config');

        $purifierConfig = \HTMLPurifier_Config::createDefault();

        if (!empty($config[Module::CONFIG_KEY_HTMLPURIFIER][Module::CONFIG_KEY_CONFIG])) {

            foreach ($config[Module::CONFIG_KEY_HTMLPURIFIER][Module::CONFIG_KEY_CONFIG] as $configKey => $configValue) {

                $purifierConfig->set($configKey, $configValue);
            }
        }

        return new \HTMLPurifier($purifierConfig);
    }
}