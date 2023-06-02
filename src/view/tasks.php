<a href="/">Главная</a>
<a href="?controller=security&action=logout">[Выход]</a></p>
<h2>Ваши задачи</h2>

<form action="/?controller=tasks&action=add" method="post">
    <input type="text" name="task" placeholder="Опишите новую задачу">
    <input type="submit" value="Добавить">
</form>
<?php foreach ($tasks as $key => $task): ?>
    <div id="<?=$task->getId()?>">
        * <?=$task->getDescription()?>
        <!-- <a href="/?controller=tasks&action=done&key=<?=$task->getId()?>">[Done]</a> -->
        <button class="done" data-id="<?= $task->getId() ?>">Done</button>
        <br><br>
    </div>
<?php endforeach; ?>

<script>
    let buttons = document.querySelectorAll('.done');
    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (
                async () => {
                    const response = await fetch('/?controller=tasks&action=apidone&id=' + id);
                    const answer = await response.json();
                    document.getElementById(answer.task_id).remove();
                }
            )();
        })
    })
</script>



