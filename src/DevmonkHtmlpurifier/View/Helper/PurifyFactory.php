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