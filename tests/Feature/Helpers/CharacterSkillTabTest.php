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
        $this->assertEquals(5, $characterSkillTab->getSkills()[4]->getLevel());
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
