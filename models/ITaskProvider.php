<?php

interface ITaskProvider 
{
    public function addTask(Task $task, int $user_id): bool;
    public function deleteTask(int $key, int $user_id): bool;
    public function getUndoneList(int $user_id): array;
}