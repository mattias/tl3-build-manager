<?php

namespace Tests\Feature\Helpers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CharacterSkillTest extends TestCase
{
    /** @test */
    public function it_exists()
    {
        $displayName = 'Light';
        $requiredLevelInSkillTab = 5;
        $skillTabRow = 2;
        $skillTabColumn = 2;
        $skillType = 'Active';
        $perLevelBonusTexts = [];
        $perLevelDescriptions = [];
        $tierBonusDescriptions = [];

        $characterSkill = new \App\Helpers\CharacterSkill(
            $displayName,
            $requiredLevelInSkillTab,
            $skillTabRow,
            $skillTabColumn,
            $skillType,
            $perLevelBonusTexts,
            $perLevelDescriptions,
            $tierBonusDescriptions
        );

        $this->assertInstanceOf(\App\Helpers\CharacterSkill::class, $characterSkill);
        $this->assertEquals($displayName, $characterSkill->getDisplayName());
        $this->assertEquals($requiredLevelInSkillTab, $characterSkill->getRequiredLevelInSkillTab());
        $this->assertEquals($skillTabRow, $characterSkill->getSkillTabRow());
        $this->assertEquals($skillTabColumn, $characterSkill->getSkillTabColumn());
        $this->assertEquals($skillType, $characterSkill->getSkillType());
        $this->assertEquals($perLevelBonusTexts, $characterSkill->getPerLevelBonusTexts());
        $this->assertEquals($perLevelDescriptions, $characterSkill->getPerLevelDescriptions());
        $this->assertEquals($tierBonusDescriptions, $characterSkill->getTierBonusDescriptions());
    }
}
