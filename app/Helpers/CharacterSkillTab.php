<?php

namespace App\Helpers;

class CharacterSkillTab
{
    protected $displayName;
    protected $skills;

    public function __construct(
        $displayName = '',
        $skills = []
    )
    {
        $this->displayName = $displayName;
        $this->skills = $skills;
    }

    public function setDisplayName(string $displayName): void
    {
        $this->displayName = $displayName;
    }

    public function getDisplayName()
    {
        return $this->displayName;
    }

    public function setSkills(array $skills): void
    {
        $this->skills = $skills;
    }

    public function getSkills()
    {
        return $this->skills;
    }
}
