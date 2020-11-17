<?php

namespace Tests\Feature\Helpers;

use App\Helpers\CharacterBuild;
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
        $level = 5;

        $characterSkill = new \App\Helpers\CharacterSkill(
            $displayName,
            $requiredLevelInSkillTab,
            $skillTabRow,
            $skillTabColumn,
            $skillType,
            $perLevelBonusTexts,
            $perLevelDescriptions,
            $tierBonusDescriptions,
            $level
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
        $this->assertEquals($level, $characterSkill->getLevel());
    }

    /** @test */
    public function it_can_set_level()
    {
        $displayName = 'Light';
        $requiredLevelInSkillTab = 5;
        $skillTabRow = 2;
        $skillTabColumn = 2;
        $skillType = 'Active';
        $perLevelBonusTexts = [];
        $perLevelDescriptions = [];
        $tierBonusDescriptions = [];
        $level = 5;

        $characterSkill = new \App\Helpers\CharacterSkill(
            $displayName,
            $requiredLevelInSkillTab,
            $skillTabRow,
            $skillTabColumn,
            $skillType,
            $perLevelBonusTexts,
            $perLevelDescriptions,
            $tierBonusDescriptions,
            $level
        );

        $characterSkill->setLevel(6);

        $this->assertEquals(6, $characterSkill->getLevel());
    }

    /** @test */
    public function it_can_get_which_tree_it_belongs_to()
    {
        $displayName = 'Holy Fury';
        $requiredLevelInSkillTab = 5;
        $skillTabRow = 2;
        $skillTabColumn = 2;
        $skillType = 'Active';
        $perLevelBonusTexts = [];
        $perLevelDescriptions = [];
        $tierBonusDescriptions = [];
        $level = 5;
        $tree = 'Light';

        $characterSkill = new \App\Helpers\CharacterSkill(
            $displayName,
            $requiredLevelInSkillTab,
            $skillTabRow,
            $skillTabColumn,
            $skillType,
            $perLevelBonusTexts,
            $perLevelDescriptions,
            $tierBonusDescriptions,
            $level,
            $tree
        );


        $this->assertEquals(CharacterBuild::LIGHT, $characterSkill->getTree());
    }
}
