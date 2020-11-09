<?php

namespace App\Helpers;

class Legendarium
{
    protected $displayName;
    protected $description;

    public function __construct($displayName = '', $description = '')
    {
        $this->displayName = $displayName;
        $this->description = $description;
    }

    public function setDisplayName(string $displayName): void
    {
        $this->displayName = $displayName;
    }

    public function getDisplayName(): string
    {
        return $this->displayName;
    }


    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
