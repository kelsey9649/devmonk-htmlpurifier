<?php

namespace DevmonkHtmlpurifier\Service;

use DevmonkHtmlpurifier\Twig\Extension;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class EnvironmentFactory
 * @package DevmonkHtmlpurifier\Service
 */
class EnvironmentFactory extends \ZfcTwig\Service\TwigEnvironmentFactory
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $twig = parent::createService($serviceLocator);

        $twig->addExtension(new Extension($twig, $serviceLocator));

        return $twig;
    }
}
