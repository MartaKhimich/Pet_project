<?php

namespace Petproject\Todoist\models;


class Task extends Model
{
    private int $user_id;
    private ?string $description;
    private bool $isDone = false;

    public function __construct(int $id = null, string $description = null)
    {
        parent::__construct($id);
        $this->description = $description;
    }

    public function getUser_id(): int
    {
        return $this->user_id;
    }

    public function setUser_id(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function isDone(): bool
    {
        return $this->isDone;
    }

    private function setIsDone(bool $isDone): void
    {
        $this->isDone = $isDone;
    }
}