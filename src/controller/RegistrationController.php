<?php
namespace Petproject\Todoist\controller;
use Petproject\Todoist\exceptions\UserExistsException;
use Petproject\Todoist\models\User;
use Petproject\Todoist\models\UserProvider;

//require_once 'models/Model.php';
//require_once "models/User.php";
//require_once 'models/UserProvider.php';

$pdo = require 'db.php';

session_start();

$error = null;

if (isset($_POST['reg_name']) && isset($_POST['reg_username']) && isset($_POST['reg_password'])) {
    ['reg_name' => $reg_name, 'reg_username' => $reg_username, 'reg_password' => $reg_password] = $_POST;

    $user = new User(null, $reg_username);
    $user->setName($reg_name);

    $reg_user = new UserProvider($pdo);
    try {
        $user->setId($reg_user->registerUser($user, $reg_password));
        $_SESSION['user'] = $user;
        $_SESSION['id'] = $user->getId();

        header('Location: /');
        die();
    } catch (UserExistsException $e) {
        $error = $e->getMessage();

    }
}

require_once 'src/view/registration.php';
