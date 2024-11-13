<?php
require 'vendor/autoload.php';
require_once "router/Router.php";

$url = isset($_GET['url']) ? explode('/', rtrim($_GET['url'], '/')) : ['users', 'id'];

// Route the request
Router::route($url);
?>

