<?php

require_once 'vendor/autoload.php';
$config = require_once 'vendor/config.php';

$fb = new \Facebook\Facebook([
    'app_id' => $config['app_id'],
    'app_secret' => $config['app_secret'],
    'default_graph_version' => $config['default_graph_version'],
    'expires' => 0,
    'cookie' => true,
//    'page_id' => $config['page_id'] // this is id App Makesuresoft.com
]);
$data = [
    'access_token' => $config['access_token'],
    'message' => 'Hello Dolphy',
    'from' => $config['app_id'],
    'to' => $config['page_id'],
    'caption' => 'Caption',
    'name' => 'Name',
    'link' => 'http://www.example.com/',
    'picture' => 'http://www.phpgang.com/wp-content/themes/PHPGang_v2/img/logo.png',
    'description' => ' via demo.PHPGang.com',
    'published'=>true,
    'multi_share_optimized'=>true,
    'filter'=>'stream',
];

try {
    // Returns a `Facebook\FacebookResponse` object
    $response = $fb->post($config['me_feed'], $data, $config['access_token']);
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

printf("<pre>%s</pre>", print_r($response, true));