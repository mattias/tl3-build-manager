<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Helpers\CharacterBuild;
use Exception;

class CharacterBuildTest extends TestCase
{
    private $cb;

    protected function setUp(): void
    {
        $this->cb = new CharacterBuild;
    }

    /** @test */
    public function it_has_class()
    {
        $this->cb->setClass(CharacterBuild::DUSK_MAGE);

        $this->assertEquals(CharacterBuild::DUSK_MAGE, $this->cb->getClass());
    }

    /** @test */
    public function it_has_relic()
    {
        $this->cb->setRelic(CharacterBuild::ELECTRODE);

        $this->assertEquals(CharacterBuild::ELECTRODE, $this->cb->getRelic());
    }

    /** @test */
    public function it_has_skill_tabs()
    {
        $skillTab = $this->getSkillTab('Light');

        $this->cb->addSkillTab($skillTab);

        $this->assertEquals('Light', $this->cb->getSkillTab(CharacterBuild::LIGHT)->getDisplayName());
    }

    /** @test */
    public function it_has_hotbar()
    {
        $skill = $this->getSkill();
        $hotbar = $this->createMock(\App\Helpers\Hotbar::class);
        $hotbar->method('getPosition')
        ->willReturn($skill);

        $this->cb = new CharacterBuild($hotbar);

        $this->assertEquals('Light', $this->cb->getHotbar()->getPosition(1)->getDisplayName());
    }

    /** @test */
    public function it_has_legendariums()
    {
        $legendarium = $this->createMock(\App\Helpers\Legendarium::class);
        $this->cb->addLegendarium($legendarium, 1);

        $this->assertSame($legendarium, $this->cb->getLegendarium(1));
    }

    /** @test */
    public function it_cannot_add_more_than_three_legendariums()
    {
        $this->expectException(Exception::class);

        $legendarium = $this->createMock(\App\Helpers\Legendarium::class);
        $this->cb->addLegendarium($legendarium, 1);
        $this->cb->addLegendarium($legendarium, 2);
        $this->cb->addLegendarium($legendarium, 3);
        $this->cb->addLegendarium($legendarium, 4);
    }

    /** @test */
    public function it_throws_exception_if_legendarium_pos_is_below_one()
    {
        $this->expectException(Exception::class);

        $legendarium = $this->createMock(\App\Helpers\Legendarium::class);

        $this->cb->addLegendarium($legendarium, 0);
    }

    /** @test */
    public function it_throws_exception_if_legendarium_pos_is_above_three()
    {
        $this->expectException(Exception::class);

        $legendarium = $this->createMock(\App\Helpers\Legendarium::class);

        $this->cb->addLegendarium($legendarium, 4);
    }

    protected function getSkillTab(string $name)
    {
        $skill1 = $this->getSkill();
        $skill2 = $this->getSkill();
        $skill3 = $this->getSkill();
        $skill4 = $this->getSkill();
        $skill5 = $this->getSkill();
        $skill6 = $this->getSkill();
        $skill7 = $this->getSkill();

        $skillTab = $this->createMock(\App\Helpers\CharacterSkillTab::class);
        $skillTab->method('getDisplayName')
            ->willReturn($name);
        $skillTab->method('getSkills')
            ->willReturn([$skill1, $skill2, $skill3, $skill4, $skill5, $skill6, $skill7]);

        return $skillTab;
    }

    protected function getSkill()
    {
        $skill = $this->createMock(\App\Helpers\CharacterSkill::class);
        $skill->method('getDisplayName')
            ->willReturn('Light');
        $skill->method('getRequiredLevelInSkillTab')
            ->willReturn(rand(1, 60));
        $skill->method('getSkillTabRow')
            ->willReturn(rand(1, 3));
        $skill->method('getSkillTabColumn')
            ->willReturn(rand(1, 5));
        $skill->method('getSkillType')
            ->willReturn('Active');
        $skill->method('getPerLevelBonusTexts')
            ->willReturn(['Bonus Text per level']);
        $skill->method('getPerLevelDescriptions')
            ->willReturn($this->getPerLevelDescription());


        return $skill;
    }

    protected function getPerLevelDescription()
    {
        return [
            '1' => $this->getLevelDescription(1),
            '3' => $this->getLevelDescription(2),
            '4' => $this->getLevelDescription(3),
            '2' => $this->getLevelDescription(4),
            '5' => $this->getLevelDescription(5),
            '6' => $this->getLevelDescription(6),
            '7' => $this->getLevelDescription(7),
            '8' => $this->getLevelDescription(8),
            '9' => $this->getLevelDescription(9),
            '10' => $this->getLevelDescription(10),
        ];
    }

    protected function getLevelDescription(int $level)
    {
        $levelDescription = $this->createMock(\App\Helpers\CharacterSkillLevelDescription::class);
        $levelDescription->method('getDescription')
            ->willReturn('A long description of the skill for the current level (points)');
        $levelDescription->method('getCooldownText')
            ->willReturn('Cooldown: 16 Sec');
        $levelDescription->method('getEnergyCostText')
            ->willReturn('5 Mana');
        $levelDescription->method('getBonusAmounts')
            ->willReturn(sprintf('+%d%%', ($level-1)*5));
    }
}
