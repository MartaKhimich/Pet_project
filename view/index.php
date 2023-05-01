<head>
    <meta charset="UTF-8">
    <title>Главная</title>
    <style>
        .button {
            background: #0d6efd;
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<h2><?= $pageHeader ?></h2>
<?php if (is_null($username)): ?>
    <a href="/?controller=registration" class="button">Зарегистрироваться</a>
    <a href="/?controller=security" class="button">Войти</a>
<?php endif; ?>
<br>
<?php include "menu.php" ?>

</body>