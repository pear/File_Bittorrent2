<?php

    /**
    * Test case for Bug #4570
    *
    * @see http://pear.php.net/bugs/bug.php?id=4570
    *
    * @author Justin "nagash" Jones <j dot nagash at gmail dot com>
    * @version $Id$
    * @package File_Bittorrent2
    * @subpackage Bugs
    */

require_once '../File/Bittorrent2/Encode.php';
require_once '../File/Bittorrent2/Decode.php';
$decoder = new File_Bittorrent2_Decode;
$encoder = new File_Bittorrent2_Encode;
error_reporting(E_ALL);

$data = array(
        'broken' => null,
        'bit' => 'torrent'
        );

echo '<pre>';

echo 'The data array:' . "\n";
print_r($data);

$encode1 = $encoder->encode_array($data);
$decode1 = $decoder->decode($encode1);

echo "\n" . 'First decode:' . "\n";
print_r($decode1); // Works fine!



// If you add and remove and change these things, your results will vary.
// Sometimes I just got an empty Array, other times I got data in the wrong keys.
// And for the worst times, it looped indefinately, but I couldn't reproduce that
// with this data - see below for an example.'
$decode1['bit'] = 'testing';
$decode1['bitlength'] = strlen($decode1['bit']);
$decode1['field'] = 'something';
$decode1['other'] = 'whee';

echo "\n" . 'New data to encode:' . "\n";
print_r($decode1);

$encode2 = $encoder->encode_array($decode1);
$decode2 = $decoder->decode($encode2);

echo "\n" . 'Second decode:' . "\n";
print_r($decode2);

$user_array = array(
    'additional' => array(),
    'password'   => '8943f909f9c2e98f44fa6ffa2ea470eb',
    'pwdlength'  => 6,
    'username'   => 'nagash',
    'usertype'   => '3',
);

$user_array_encoded = $encoder->encode($user_array);
echo "\n";
echo "User_array:\n";
var_dump($user_array);
echo "\n\n";
echo "Encoded user_array:\n";
echo $user_array_encoded . "\n\n";
echo "Decoded encoded user_array:\n";
var_dump($decoder->decode($user_array_encoded));
echo "\n\n";

echo '</pre>';

?>