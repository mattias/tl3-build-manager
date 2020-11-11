<?php

namespace App\Helpers;

class CharacterSkillLevelDescription
{
    protected $description;
    protected $cooldownText;
    protected $energyCostText;
    protected $bonusAmounts;

    public function __construct(
        $description = '',
        $cooldownText = '',
        $energyCostText = '',
        $bonusAmounts = ''
    )
    {
        $this->description = $description;
        $this->cooldownText = $cooldownText;
        $this->energyCostText = $energyCostText;
        $this->bonusAmounts = $bonusAmounts;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setCooldownText(string $cooldownText): void
    {
        $this->cooldownText = $cooldownText;
    }

    public function getCooldownText(): string
    {
        return $this->cooldownText;
    }

    public function setEnergyCostText(string $energyCostText): void
    {
        $this->energyCostText = $energyCostText;
    }

    public function getEnergyCostText(): string
    {
        return $this->energyCostText;
    }

    public function setBonusAmounts(string $bonusAmounts): void
    {
        $this->bonusAmounts = $bonusAmounts;
    }

    public function getBonusAmounts(): string
    {
        return $this->bonusAmounts;
    }
}
