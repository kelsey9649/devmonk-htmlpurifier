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
use DevmonkHtmlpurifier\Module;
use DevmonkHtmlpurifier\Twig\Filter;

class FilterTest extends \PHPUnit_Framework_TestCase
{
    /** @var Filter */
    protected $sut;

    public function setUp()
    {
        Module::setConstants();

        $this->sut = new Filter();
    }

    public function testMissingServiceLocatorReturnsNull()
    {
        // ----------------------------------------------------------------
        // execute
        //
        $actual = Filter::purify('dirtyHtml');

        // ----------------------------------------------------------------
        // test the results
        //
        $this->assertSame(null, $actual);
    }

    public function testMissingServiceReturnsNull()
    {
        // ----------------------------------------------------------------
        // setup test parameters
        //
        $mockServiceLocator = $this->getMock('Zend\ServiceManager\ServiceLocatorInterface');
        Filter::setServiceLocator($mockServiceLocator);

        // ----------------------------------------------------------------
        // setup mock expectations
        //
        $mockServiceLocator
            ->expects($this->once())
            ->method('get')
            ->with(Module::SERVICE_NAME)
            ->will($this->returnValue('Not an instance of \\HTMLPurifier.'));

        // ----------------------------------------------------------------
        // execute
        //
        $actual = Filter::purify('dirtyHtml');

        // ----------------------------------------------------------------
        // test the results
        //
        $this->assertSame(null, $actual);
    }

    public function testPurifyCallsPurifyOfService()
    {
        // ----------------------------------------------------------------
        // setup test parameters
        //
        $inputText = 'dirtyHtml';
        $outputText = 'purified-glorified!';
        $mockServiceLocator = $this->getMock('Zend\ServiceManager\ServiceLocatorInterface');
        $mockPurifier = $this->getMock('HTMLPurifier');
        Filter::setServiceLocator($mockServiceLocator);

        // ----------------------------------------------------------------
        // setup mock expectations
        //
        $mockServiceLocator
            ->expects($this->once())
            ->method('get')
            ->with(Module::SERVICE_NAME)
            ->will($this->returnValue($mockPurifier));
        $mockPurifier
            ->expects($this->once())
            ->method('purify')
            ->with($inputText)
            ->will($this->returnValue($outputText));

        // ----------------------------------------------------------------
        // execute
        //
        $actual = Filter::purify($inputText);

        // ----------------------------------------------------------------
        // test the results
        //
        $this->assertSame($outputText, $actual);
    }
}