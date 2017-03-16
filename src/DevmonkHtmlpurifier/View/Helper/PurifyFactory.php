<?php

namespace DevmonkHtmlpurifier\View\Helper;

use Zend\ServiceManager\AbstractPluginManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class PurifyFactory
 * @package DevmonkHtmlpurifier\View\Helper
 */
class PurifyFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface|AbstractPluginManager $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $services = $serviceLocator->getServiceLocator();

        /** @var  $purifier */
        $purifier = $services->get('purifier');

        return new Purify($purifier);
    }
}