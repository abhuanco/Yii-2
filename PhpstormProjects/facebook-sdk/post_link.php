<?php
require_once 'vendor/autoload.php';
$config = require_once 'vendor/config.php';

$fb = new Facebook\Facebook([
    'app_id' => $config['app_id'],
    'app_secret' => $config['app_secret'],
    'default_graph_version' => $config['default_graph_version'],
    'expires' => 0,
    'page_id'=>'1567710166830880' // this is id App Makesuresoft.com
]);

//1567710166830880


$linkData = [
    'link' => 'http://www.example.com',
    'message' => 'This is new post for test',
    'caption'=>'Hello',
];

try {
    // Returns a `Facebook\FacebookResponse` object
    $response = $fb->post('/1567710166830880/feed', $linkData, $config['access_token']);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

$graphNode = $response->getApp();

printf("<pre>%s</pre>", print_r($graphNode, true));