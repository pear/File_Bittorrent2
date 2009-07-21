<?php

// +----------------------------------------------------------------------+
// | Decode and Encode data in Bittorrent format                          |
// +----------------------------------------------------------------------+
// | Copyright (C) 2004-2005 Markus Tacker <m@tacker.org>                 |
// +----------------------------------------------------------------------+
// | This library is free software; you can redistribute it and/or        |
// | modify it under the terms of the GNU Lesser General Public           |
// | License as published by the Free Software Foundation; either         |
// | version 2.1 of the License, or (at your option) any later version.   |
// |                                                                      |
// | This library is distributed in the hope that it will be useful,      |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of       |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU    |
// | Lesser General Public License for more details.                      |
// |                                                                      |
// | You should have received a copy of the GNU Lesser General Public     |
// | License along with this library; if not, write to the                |
// | Free Software Foundation, Inc.                                       |
// | 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA               |
// +----------------------------------------------------------------------+

/**
* Test for Bug #16148
*
* @link http://pear.php.net/bugs/bug.php?id=16148
* @package File_Bittorrent2
* @subpackage Test
* @category File
* @author Markus Tacker <m@tacker.org>
* @version $Id$
*/

require_once 'PHPUnit/Framework/TestCase.php';
require_once 'File/Bittorrent2/Encode.php';

error_reporting( E_ALL | E_STRICT );
ini_set( 'display_errors', 1 );
ini_set( 'log_errors', 0 );

/**
* Test for Bug #16148
*
* @link http://pear.php.net/bugs/bug.php?id=16148
* @package File_Bittorrent2
* @subpackage Test
* @category File
* @author Markus Tacker <m@tacker.org>
* @version $Id$
*/
class Tests_Bug16148 extends PHPUnit_Framework_TestCase
{
	public function testEncodeInt()
	{
		$ints = array(
			10000,
			100000,
			1000000,
			10000000,
			100000000,
			1000000000,
			10000000000,
			100000000000,
			1000000000000,
			10000000000000,
			100000000000000
		);

		$Encoder = new File_Bittorrent2_Encode;
		foreach($ints as $int) {
			$this->assertEquals('i'. sprintf('%.0f', $int) . 'e', $Encoder->encode($int), 'Asserting that the integer is represented correctly.');
		}
	}
}