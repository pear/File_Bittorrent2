<?php

/**
 * Test case for Ticket #19
 *
 * @see http://projects.tacker.org/trac/File_Bittorrent/ticket/19
 *
 * @author Markus Tacker <m@tacker.org>
 * @version $Id$
 * @package File_Bittorrent2
 * @subpackage Bugs
 */

require_once dirname(__FILE__) . '/../File/Bittorrent2/Decode.php';

class Tests_Ticket19 extends PHPUnit_Framework_TestCase
{
	public function testGetAnnounceList()
	{
		$File_Bittorrent2_Decode = new File_Bittorrent2_Decode;
		$info = $File_Bittorrent2_Decode->decodeFile(dirname(__FILE__) . '/../install-x86-universal-2005.0.iso.torrent');
		$this->assertType('array', $File_Bittorrent2_Decode->getAnnounceList());
	}

	public function testGetRawInfoHash()
	{
		$File_Bittorrent2_Decode = new File_Bittorrent2_Decode;
		$info = $File_Bittorrent2_Decode->decodeFile(dirname(__FILE__) . '/../install-x86-universal-2005.0.iso.torrent');
		$this->assertType('string', $File_Bittorrent2_Decode->getInfoHash(true));
		$this->assertEquals(20, strlen($File_Bittorrent2_Decode->getInfoHash(true)));
		$this->assertEquals(40, strlen($File_Bittorrent2_Decode->getInfoHash()));
	}
}