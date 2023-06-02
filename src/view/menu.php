<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php if ($username !== null): ?>
    <a href="/">Главная</a>
    <a href="/?controller=tasks">Задачи</a><br>
    <p>Рады вас приветствовать, <?= $username ?>!</p>
    <a href="?controller=security&action=logout">[Выход]</a>
<?php endif ?>
</body>
</html>
