<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

//$ch = curl_init('195.208.146.48:8008/addressbooks/users/test/addressbook/');
$ch = curl_init('195.208.146.48:5000/carddav/Synology/f21b8d78-5741-4f11-965b-e62f4c21e328');

curl_setopt($ch, CURLOPT_PORT, 5000);
curl_setopt($ch, CURLOPT_USERPWD, 'test:QW!@we23');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt($ch, CURLOPT_HEADER, false);

$data = curl_exec($ch);

$header_size		= curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$http_code 			= curl_getinfo($ch, CURLINFO_HTTP_CODE);

$pattern = "/[\._a-zA-Z0-9-]+@[\._a-zA-Z0-9-]+/";
preg_match_all($pattern, $data, $result);

//$result = explode(':', $html);

var_dump($data, $result, $header_size, $http_code);

curl_close($ch);