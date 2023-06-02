<?php
namespace Petproject\Todoist\controller;
use Petproject\Todoist\models\UserProvider;
//
//require_once 'models/User.php';
//require_once 'models/UserProvider.php';

session_start();

$pdo = require 'db.php';

$error = null;


if (isset($_POST['username'], $_POST['password'])) {
    ['username' => $username, 'password' => $password] = $_POST;
    $userProvider = new UserProvider($pdo);
    $user = $userProvider->getByUsernameAndPassword($username, $password);
    if ($user === null) {
        $error = 'Пользователь с указанными учетными данными не найден';
    } else {
        $_SESSION['username'] = $user;
        $_SESSION['id'] = $user->getId();
        header("Location: index.php");
        die();
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    unset($_SESSION['username']);
    unset($_SESSION['tasks']);
    session_destroy();
    header('Location: index.php');
    die();
}

include "src/view/signin.php";