<?php
session_start();
require_once 'vendor/autoload.php';
$config = require_once 'vendor/config.php';
$fb = new Facebook\Facebook([
    'app_id' => $config['app_id'],
    'app_secret' => $config['app_secret'],
    'default_graph_version' => $config['default_graph_version'],
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email', 'publish_actions', 'publish_pages', 'manage_pages']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://localhost:9090/fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';