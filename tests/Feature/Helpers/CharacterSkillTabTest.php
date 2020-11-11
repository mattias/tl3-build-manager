<?php

namespace Tests\Feature\Helpers;

use App\Helpers\CharacterSkillTab;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CharacterSkillTabTest extends TestCase
{
    /** @test */
    public function it_exists()
    {
        $displayName = 'Light';
        $skills = [];
        $characterSkillTab = new CharacterSkillTab(
            $displayName,
            $skills
        );

        $this->assertInstanceOf(CharacterSkillTab::class, $characterSkillTab);
        $this->assertEquals($displayName, $characterSkillTab->getDisplayName());
        $this->assertEquals($skills, $characterSkillTab->getSkills());
    }
}
