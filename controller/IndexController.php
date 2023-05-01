<?php
require_once 'models/User.php';
session_start();

$pageHeader = 'Добро пожаловать в TODO:-)';

$username = null;

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']->getUsername();
}

include "view/index.php";