<?php

namespace DevmonkHtmlpurifier\Twig;

use Twig_Extension;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class Extension
 * @package DevmonkHtmlpurifier\Twig
 */
class Extension extends Twig_Extension
{
    /**
     * @var Environment
     */
    protected $env;

    /**
     * @var ServiceLocatorInterface
     */
    protected $serviceLocator;

    /**
     * Extension constructor.
     * @param \Twig_Environment $env
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function __construct(\Twig_Environment $env, ServiceLocatorInterface $serviceLocator)
    {
        $this->env = $env;
        $this->serviceLocator = $serviceLocator;

        Filter::setServiceLocator($this->serviceLocator);
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return [
            'purify' => new Filter(),
        ];
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'DevmonkHtmlpurifier';
    }
}
