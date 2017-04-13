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
use DevmonkHtmlpurifier\View\Helper\Purify;
use DevmonkHtmlpurifier\Module;

class PurifyTest extends \PHPUnit_Framework_TestCase
{
    /** @var Purify */
    protected $sut;

    /** @var \HTMLPurifier */
    protected $mockPurifier;

    public function setUp()
    {
        /** @var \HTMLPurifier $mockPurifier  */
        $this->mockPurifier = $this->createMock('\HTMLPurifier');

        $this->sut = new Purify($this->mockPurifier);
    }

    public function testSetPurifierGetsCalledOnInvoke()
    {
        // ----------------------------------------------------------------
        // setup test parameters
        //
        $dirtyHtml = 'dirtyHtml';
        $expected = 'purified-glorified!';

        // ----------------------------------------------------------------
        // setup mock expectations
        //
        $this->mockPurifier
            ->expects($this->once())
            ->method('purify')
            ->with($dirtyHtml)
            ->will($this->returnValue($expected));

        // ----------------------------------------------------------------
        // execute
        //
        $sut = $this->sut;
        $actual = $sut($dirtyHtml);

        // ----------------------------------------------------------------
        // test the results
        //
        $this->assertEquals($actual, $expected);
    }
}