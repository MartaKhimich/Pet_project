<?php

use Petproject\Todoist\models\User;
use Petproject\Todoist\models\UserProvider;



$pdo = require 'db.php';

//создание таблицы users

$pdo->exec('CREATE TABLE users (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(150),
    username VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL
)');

$user = new User('admin');
$user->setName('Marta Khimich');

$userProvider = new UserProvider($pdo);
$userProvider->registerUser($user, '123');

//создание таблицы tasks

$pdo->exec('CREATE TABLE tasks (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER NOT NULL,
    description TEXT NOT NULL
)');

