<?php

namespace Petproject\Todoist\models;

use Petproject\Todoist\models\Model;


class User extends Model
{
    private ?string $username;
    private ?string $name;

    public function __construct(int $id = null, string $username = null)
    {
        parent::__construct($id);
        $this->username = $username;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {$this->name = $name;

        return $this;
    }

}