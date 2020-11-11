<?php

namespace Tests\Feature\Helpers;

use App\Helpers\CharacterSkillLevelDescription;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CharacterSkillLevelDescriptionTest extends TestCase
{
    /** @test */
    public function it_exists()
    {
        $description = 'abc';
        $cooldownText = 'cooldown 16 sec';
        $energyCostText = 'energy cost';
        $bonusAmounts = '+45%';
        $characterSkillLevelDescription = new CharacterSkillLevelDescription(
            $description,
            $cooldownText,
            $energyCostText,
            $bonusAmounts
        );

        $this->assertInstanceOf(CharacterSkillLevelDescription::class, $characterSkillLevelDescription);
        $this->assertEquals($description, $characterSkillLevelDescription->getDescription());
        $this->assertEquals($cooldownText, $characterSkillLevelDescription->getCooldownText());
        $this->assertEquals($energyCostText, $characterSkillLevelDescription->getEnergyCostText());
        $this->assertEquals($bonusAmounts, $characterSkillLevelDescription->getBonusAmounts());
    }
}
