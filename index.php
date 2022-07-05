<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

const USER = 'test'; //ввести актуальные данные
const PASS = '*******'; //ввести актуальные данные

$ch = curl_init('195.208.146.48:5000/carddav/Synology/f21b8d78-5741-4f11-965b-e62f4c21e328');

curl_setopt($ch, CURLOPT_PORT, 5000);
curl_setopt($ch, CURLOPT_USERPWD, USER . ':' . PASS);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);

$data = curl_exec($ch);

$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if($http_code == 200 && $data) {
    $pattern = "/[\._a-zA-Z0-9-]+@[\._a-zA-Z0-9-]+/";
    preg_match_all($pattern, $data, $result);
    $result = array_unique($result[0]);

    var_dump($data, $result, $http_code);
} else {
    echo 'Данные или соединение отсутствуют';
}

curl_close($ch);


