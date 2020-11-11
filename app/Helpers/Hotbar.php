<?php

namespace App\Helpers;

use Exception;

class Hotbar
{
    protected $hotbar = [];

    public function __construct(
        $skills = []
    ) {
        foreach ($skills as $key => $skill) {
            if ($key < 1 || $key > 9) {
                continue;
            }
            $this->hotbar[$key] = $skill;
        }
    }

    public function setPosition(int $pos, CharacterSkill $characterSkill): void
    {
        if($pos < 1 || $pos > 9)
        {
            throw new Exception("Stay within range 1 to 9");
        }
        $this->hotbar[$pos] = $characterSkill;
    }

    public function getPosition(int $pos): ?CharacterSkill
    {
        return $this->hotbar[$pos] ?? null;
    }
}
