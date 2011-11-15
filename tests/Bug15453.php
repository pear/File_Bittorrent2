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
* Test for Bug #15453
*
* @link http://pear.php.net/bugs/bug.php?id=15453
* @package File_Bittorrent2
* @subpackage Test
* @category File
* @author Markus Tacker <m@tacker.org>
* @version $Id$
*/

require_once 'PHPUnit/Framework/TestCase.php';
require_once 'File/Bittorrent2/Decode.php';

error_reporting( E_ALL | E_STRICT );
ini_set( 'display_errors', 1 );
ini_set( 'log_errors', 0 );

/**
* Test for Bug #15453
*
* @link http://pear.php.net/bugs/bug.php?id=15453
* @package File_Bittorrent2
* @subpackage Test
* @category File
* @author Markus Tacker <m@tacker.org>
* @version $Id$
*/
class Tests_Bug15453 extends PHPUnit_Framework_TestCase
{
	public function testScrape()
	{
		if (!(bool)ini_get('allow_url_fopen')) $this->markTestSkipped();
		// Decode the torrent
		$File_Bittorrent2_Decode = new File_Bittorrent2_Decode;
		$temp = tempnam(sys_get_temp_dir(), __CLASS__);
		file_put_contents($temp, file_get_contents('http://torrents.thepiratebay.org/4442311/Brothers.and .Sisters.S03E03.HDTV.XviD-NoTV.avi.4442311.TPB.torrent'));
		$File_Bittorrent2_Decode->decodeFile($temp);
		$stats = $File_Bittorrent2_Decode->getStats();
		unlink($temp);
	}
}