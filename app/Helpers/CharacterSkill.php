<?php

namespace App\Helpers;

class CharacterSkill
{
    protected $displayName;
    protected $requiredLevelInSkillTab;
    protected $skillTabRow;
    protected $skillTabColumn;
    protected $skillType;
    protected $perLevelBonusTexts;
    protected $perLevelDescriptions;

    public function __construct(
        $displayName = '',
        $requiredLevelInSkillTab = 1,
        $skillTabRow = 1,
        $skillTabColumn = 1,
        $skillType = '',
        $perLevelBonusTexts = [],
        $perLevelDescriptions = []
    ) {
        $this->displayName = $displayName;
        $this->requiredLevelInSkillTab = $requiredLevelInSkillTab;
        $this->skillTabRow = $skillTabRow;
        $this->skillTabColumn = $skillTabColumn;
        $this->skillType = $skillType;
        $this->perLevelBonusTexts = $perLevelBonusTexts;
        $this->perLevelDescriptions = $perLevelDescriptions;
    }

    public function setDisplayName(string $displayName): void
    {
        $this->displayName = $displayName;
    }

    public function getDisplayName(): string
    {
        return $this->displayName;
    }

    public function setRequiredLevelInSkillTab(int $requiredLevelInSkillTab): void
    {
        $this->requiredLevelInSkillTab = $requiredLevelInSkillTab;
    }

    public function getRequiredLevelInSkillTab(): int
    {
        return $this->requiredLevelInSkillTab;
    }

    public function setSkillTabRow(int $skillTabRow): void
    {
        $this->skillTabRow = $skillTabRow;
    }

    public function getSkillTabRow(): int
    {
        return $this->skillTabRow;
    }

    public function setSkillTabColumn(int $skillTabColumn): void
    {
        $this->skillTabColumn = $skillTabColumn;
    }

    public function getSkillTabColumn(): int
    {
        return $this->skillTabColumn;
    }

    public function setSkillType(string $skillType): void
    {
        $this->skillType = $skillType;
    }

    public function getSkillType(): string
    {
        return $this->skillType;
    }

    public function setPerLevelBonusTexts(string $perLevelBonusTexts, int $pos = 0): void
    {
        $this->perLevelBonusTexts[$pos] = $perLevelBonusTexts;
    }

    public function getPerLevelBonusTexts(): array
    {
        return $this->perLevelBonusTexts;
    }

    public function setPerLevelDescriptions(CharacterSkillLevelDescription $perLevelDescriptions, int $pos = 1): void
    {
        $this->perLevelDescriptions[$pos] = $perLevelDescriptions;
    }

    public function getPerLevelDescriptions(): array
    {
        return $this->perLevelDescriptions;
    }
}
