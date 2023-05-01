<?php
//session_start();
//unset($_SESSION['username']);

$controller = $_GET['controller'] ?? 'index';

$routes = require 'routes.php';

try {
    require_once $routes[$controller] ?? Die("404");
} catch(Throwable $exception) {
    echo $exception->getMessage();
}

