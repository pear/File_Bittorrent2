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
    * Info-Hash Test
    * Compares the info_hash compution of this package to the original program implementation
    *
    * Usage:
    *   # php infohash.php -t file.torrent
    *
    * @author Markus Tacker <m@tacker.org>
    * @version $Id$
    */

    error_reporting(E_ALL);

    // Includes
    require_once 'File/Bittorrent2/Decode.php';
    require_once 'Console/Getargs.php';

    // Get filename from command line
    $args_config = array(
        'torrent' => array(
            'short' => 't',
            'min' => 1,
            'max' => 1,
            'desc' => 'Filename of the torrent'
        ),
    );
    $args =& Console_Getargs::factory($args_config);
    if (PEAR::isError($args) or !($torrent = $args->getValue('torrent'))) {
        echo Console_Getargs::getHelp($args_config)."\n";
        exit;
    }

    if (!is_readable($torrent)) {
        echo 'ERROR: "' . $torrent . "\" is not readable.\n";
        exit;
    }

    $File_Bittorrent2_Decode = new File_Bittorrent2_Decode;
    $File_Bittorrent2_Decode->decodeFile($torrent);

    echo "\nInfo Hash\n";
    echo "+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++\n";
    echo "This:                " . $File_Bittorrent2_Decode->getInfoHash() . "\n";
    
    exec('torrentinfo-console ' . escapeshellarg($torrent), $bt);
    echo "torrentinfo-console: " . substr($bt[3], strpos($bt[3], ':') + 2) . "\n";

?>
