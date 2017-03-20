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

use Zend\View\Helper\AbstractHelper;

/**
 * Class Purify
 * @package DevmonkHtmlpurifier\View\Helper
 */
class Purify extends AbstractHelper
{
    /** @var \HTMLPurifier */
    protected $purifier;

    /**
     * @param \HTMLPurifier $purifier
     */
    public function __construct(\HTMLPurifier $purifier)
    {
        $this->purifier = $purifier;
    }

    /**
     * @param string $dirtyHtml
     *
     * @return string
     */
    public function __invoke($dirtyHtml)
    {
        return $this->purifier->purify($dirtyHtml);
    }
}
