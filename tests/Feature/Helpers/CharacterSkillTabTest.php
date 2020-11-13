<?php

namespace Tests\Feature\Helpers;

use App\Helpers\CharacterSkill;
use App\Helpers\CharacterSkillTab;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CharacterSkillTabTest extends TestCase
{
    /** @test */
    public function it_exists()
    {
        $displayName = 'Light';
        $levels = [1, 2, 3, 4, 5, 6, 7];
        $characterSkillTab = new CharacterSkillTab($displayName, $levels);

        $this->assertInstanceOf(CharacterSkillTab::class, $characterSkillTab);
        $this->assertEquals($displayName, $characterSkillTab->getDisplayName());
        $this->assertIsArray($characterSkillTab->getSkills());
        $this->assertInstanceOf(CharacterSkill::class, $characterSkillTab->getSkills()[0]);
        $this->assertEquals(1, $characterSkillTab->getSkills()[0]->getLevel());
        $this->assertEquals('Holy Bolt', $characterSkillTab->getSkills()[0]->getDisplayName());
        $this->assertEquals(2, $characterSkillTab->getSkills()[1]->getLevel());
        $this->assertEquals('Radiant Blast', $characterSkillTab->getSkills()[1]->getDisplayName());
        $this->assertEquals(3, $characterSkillTab->getSkills()[2]->getLevel());
        $this->assertEquals('Consecration', $characterSkillTab->getSkills()[2]->getDisplayName());
        $this->assertEquals(4, $characterSkillTab->getSkills()[3]->getLevel());
        $this->assertEquals('Light Spear', $characterSkillTab->getSkills()[3]->getDisplayName());
        $this->assertEquals(5, $characterSkillTab->getSkills()[4]->getLevel());
        $this->assertEquals('Holy Fury', $characterSkillTab->getSkills()[4]->getDisplayName());
        $this->assertEquals(6, $characterSkillTab->getSkills()[5]->getLevel());
        $this->assertEquals('Luminous Run', $characterSkillTab->getSkills()[5]->getDisplayName());
        $this->assertEquals(7, $characterSkillTab->getSkills()[6]->getLevel());
        $this->assertEquals('Absolver', $characterSkillTab->getSkills()[6]->getDisplayName());
    }

    /** @test */
    public function it_throws_error_if_display_name_doesnt_exist()
    {
        $this->expectException(Exception::class);

        $displayName = 'Missing';
        $levels = [];
        $characterSkillTab = new CharacterSkillTab($displayName, $levels);
    }
}
