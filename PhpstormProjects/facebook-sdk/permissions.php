<?php
session_start();
require_once 'vendor/autoload.php';
$config = require_once 'vendor/config.php';

use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;

$api_id = $config['app_id'];
$api_secret = $config['app_secret'];
$url = "http://localhost:9090/permissions.php";
$fb = new Facebook([
    "app_id" => $api_id,
    "app_secret" => $api_secret,
    "default_graph_version" => "v2.2",
]);
$linkData = [
    'link' => 'http://www.localhost.com:9090',
    'message' => 'I Like DaniWeb IT Discussion Forum',
];
$helper = $fb->getRedirectLoginHelper();
try {
    $token = $helper->getAccessToken();
    if (isset($token)) {
        $response = $fb->post('/1567710166830880/feed', $linkData, $config['access_token']);
        $graphNode = $response->getGraphNode();
        echo 'Posted with id: ' . $graphNode['id'];
    } else {
        $permision = array("scope" => "email,publish_actions,manage_pages");
        echo "<a href='" . $helper->getLoginUrl($url, $permision) . "'>Click to post</a>";
    }
} catch (FacebookSDKException $e) {
    echo $e->getMessage();
}
