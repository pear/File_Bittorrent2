<?php

// +----------------------------------------------------------------------+
// | Decode and Encode data in Bittorrent format                          |
// +----------------------------------------------------------------------+
// | Copyright (C) 2004-2006 Markus Tacker <m@tacker.org>                 |
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
    * Test for File_Bittorrent2
    *
    * @package File_Bittorrent2
    * @subpackage Test
    * @category File
    * @author Markus Tacker <m@tacker.org>
    * @version $Id$
    */

    ini_set('display_errors', 1);

    require_once 'tests/FileBittorrent2Test.php';
    require_once 'tests/Bug7406Test.php';
    require_once 'tests/Bug8085Test.php';
    require_once 'tests/Bug14013Test.php';
    require_once 'tests/Bug15453Test.php';
    require_once 'tests/Bug16148Test.php';
    require_once 'tests/Ticket19Test.php';

    /**
    * Test for File_Bittorrent2
    *
    * @package File_Bittorrent2
    * @subpackage Test
    * @category File
    * @author Markus Tacker <m@tacker.org>
    * @version $Id$
    */
    class AllTests {

        public static function suite() {
            $suite = new PHPUnit_Framework_TestSuite();

            $suite->addTestSuite('FileBittorrent2Test');
            $suite->addTestSuite('Bug7406Test');
            $suite->addTestSuite('Bug8085Test');
            $suite->addTestSuite('Bug14013Test');
            $suite->addTestSuite('Bug15453Test');
            $suite->addTestSuite('Bug16148Test');
			$suite->addTestSuite('Ticket19Test');
            return $suite;
        }
    }

?>