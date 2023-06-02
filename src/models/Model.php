<?php

namespace Petproject\Todoist\models;
class Model
{
    protected ?int $id;

    public function __construct(int $id = null)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

}