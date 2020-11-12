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
    protected $tierBonusDescriptions;
    protected $level;

    public function __construct(
        string $displayName = '',
        int $requiredLevelInSkillTab = 1,
        int $skillTabRow = 1,
        int $skillTabColumn = 1,
        string $skillType = '',
        array $perLevelBonusTexts = [],
        array $perLevelDescriptions = [],
        array $tierBonusDescriptions = [],
        int $level = 1
    ) {
        $this->displayName = $displayName;
        $this->requiredLevelInSkillTab = $requiredLevelInSkillTab;
        $this->skillTabRow = $skillTabRow;
        $this->skillTabColumn = $skillTabColumn;
        $this->skillType = $skillType;
        $this->perLevelBonusTexts = $perLevelBonusTexts;
        $this->perLevelDescriptions = $perLevelDescriptions;
        $this->tierBonusDescriptions = $tierBonusDescriptions;
        $this->level = $level;
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

    public function setPerLevelBonusTexts(array $perLevelBonusTexts): void
    {
        $this->perLevelBonusTexts = $perLevelBonusTexts;
    }

    public function getPerLevelBonusTexts(): array
    {
        return $this->perLevelBonusTexts;
    }

    public function setPerLevelDescriptions(array $perLevelDescriptions): void
    {
        $this->perLevelDescriptions = $perLevelDescriptions;
    }

    public function getPerLevelDescriptions(): array
    {
        return $this->perLevelDescriptions;
    }

    public function setTierBonusDescriptions(array $tierBonusDescriptions): void
    {
        $this->tierBonusDescriptions = $tierBonusDescriptions;
    }

    public function getTierBonusDescriptions(): array
    {
        return $this->tierBonusDescriptions;
    }

    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    public function getLevel(): int
    {
        return $this->level;
    }
}
