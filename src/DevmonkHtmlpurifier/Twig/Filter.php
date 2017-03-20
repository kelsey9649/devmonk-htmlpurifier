<?php
/**
 * DevmonkHtmlpurifier Copyright (C) 2013-2017 Peter Aba
 * Contributors: Curtis Kelsey <curtis.kelsey@gmail.com>
 *
 * This library is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Lesser General Public License as published by the Free
 * Software Foundation; either version 2.1 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU Lesser General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this library; if not, write to the Free Software Foundation, Inc.,
 * 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
 */
namespace DevmonkHtmlpurifier\Twig;

use DevmonkHtmlpurifier\Module;
use Twig_Filter_Function;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class Filter
 * @package DevmonkHtmlpurifier\Twig
 */
class Filter extends Twig_Filter_Function
{
    /** @var ServiceLocatorInterface */
    protected static $serviceLocator;

    /**
     * Constructor for Twig Filter
     */
    public function __construct()
    {
        parent::__construct(
            'DevmonkHtmlpurifier\Twig\Filter::purify',
            [
                'is_safe' => ['all']
            ]
        );
    }

    /**
     * @param \Zend\ServiceManager\ServiceLocatorInterface $serviceLocator
     */
    public static function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        static::$serviceLocator = $serviceLocator;
    }

    /**
     * Has to be static call because of twig
     *
     * @param string $dirtyHtml
     *
     * @return string|null
     */
    public static function purify($dirtyHtml)
    {
        $service = static::getService();

        if (!is_object($service) || !$service instanceof \HTMLPurifier) {
            return null;
        }

        return $service->purify($dirtyHtml);
    }

    /**
     * Has to be static call so it can be called from purify
     *
     * @return \HTMLPurifier|null
     */
    protected static function getService()
    {
        if (null == static::$serviceLocator) {
            return null;
        }

        return static::$serviceLocator->get(Module::SERVICE_NAME);
    }
}
