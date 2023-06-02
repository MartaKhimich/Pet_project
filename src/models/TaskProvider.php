<?php

namespace Petproject\Todoist\models;

use PDO;
use Petproject\Todoist\exceptions\TaskAlreadyIsDoneException;

class TaskProvider implements ITaskProvider
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUndoneList(int $user_id): array
    {
        $statement = $this->pdo->prepare(
            'SELECT * FROM tasks WHERE user_id = :id'
        );

        $statement->execute([
            'id' => $user_id
        ]);

        return $statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Task::class);
    }

    public function addTask(Task $task, int $user_id): bool
    {
        $statement = $this->pdo->prepare(
            'INSERT INTO tasks (user_id, description) VALUES(:user_id, :description)'
        );

        return $statement->execute([
            'user_id' => $user_id,
            'description' => $task->getDescription()
        ]);
    }

    public function deleteTask(int $key, int $user_id): bool
    {
        $statement = $this->pdo->prepare(
            'DELETE FROM tasks WHERE id = :id AND user_id = :user_id'
        );
        $res = $statement->execute([
            'user_id' => $user_id,
            'id' => $key
        ]);
        if ($statement->rowCount() == 0) {
            throw new TaskAlreadyIsDoneException("Такой задачи не существует");
        }
        return $res;
    }

    //хранилище задач
    // private array $tasks;

    // public function __construct()
    // {
    //     $this->tasks = $_SESSION['tasks'] ?? [];
    // }

    //функция получения невыполненных задач

    // public function getUndoneList(): array
    // {
    //     $tasks = [];
    //     foreach ($this->tasks as $key => $task) {
    //         if (!$task->isDone()){
    //             $tasks[$key] = $task;
    //         }
    //     }

    //     return $tasks;
    // }

    // public function addTask(Task $task): void
    // {
    //сохраняем задачи в сессию,
    //чтобы при перезагрузке страницы, данные не исчезали

    //     $_SESSION['tasks'][] = $task;
    //     $this->tasks[] = $task;
    // }

    // public function deleteTask(int $key): void
    // {
    //     unset($_SESSION['tasks'][$key]);
    //     unset($this->tasks[$key]);
    // }

}