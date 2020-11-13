<?php

namespace App\Helpers;

use Exception;

class Hotbar
{
    protected $hotbar = [];

    public function __construct(
        $positions,
        $skilltabs
    ) {
        foreach ($positions as $pos) {
            $tab = $this->getTabFromPos($pos);
            $relativePosition = $this->getRelativePositionFromPos($pos);
            $this->hotbar[] = $skilltabs[$tab]->getSkills()[$relativePosition];
        }
    }

    public function setPosition(int $pos, CharacterSkill $characterSkill): void
    {
        if ($pos < 1 || $pos > 9) {
            throw new Exception("Stay within range 1 to 9");
        }
        $this->hotbar[$pos] = $characterSkill;
    }

    public function getPosition(int $pos): ?CharacterSkill
    {
        return $this->hotbar[$pos] ?? null;
    }

    private function getTabFromPos(int $pos): ?int
    {
        if (in_array($pos, range(3, 9))) {
            return 0;
        }

        if (in_array($pos, range(10, 16))) {
            return 1;
        }

        if (in_array($pos, range(17, 26))) {
            return 2;
        }

        return false;
    }

    private function getRelativePositionFromPos(int $pos): int
    {
        if (in_array($pos, range(3, 9))) {
            return $pos - 3;
        }

        if (in_array($pos, range(10, 16))) {
            return $pos - 10;
        }

        if (in_array($pos, range(17, 26))) {
            return $pos - 17;
        }

        return $pos;
    }
}
