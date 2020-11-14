<?php

namespace Tests\Feature\Helpers;

use App\Helpers\CharacterSkill;
use App\Helpers\CharacterSkillTab;
use App\Helpers\Hotbar;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HotbarTest extends TestCase
{
    protected $hotbar;

    protected function createHotbar(): void
    {
        $tree1Points = [1, 5, 6, 7, 2, 3, 4];
        $tree1 = new CharacterSkillTab("Light", $tree1Points);

        $tree2Points = [7, 1, 6, 4, 2, 5, 3];
        $tree2 = new CharacterSkillTab("Dark", $tree2Points);

        $relicPoints = [1, 0, 0, 0, 0, 1, 0, 0, 1, 0];
        $relicTree = new CharacterSkillTab("Blood Drinker", $relicPoints);

        $skilltabs = [
            $tree1,
            $tree2,
            $relicTree,
        ];

        $positions = [12, 15, 17, 10, 25, 8, 6, 1, 4];
        $this->hotbar = new Hotbar($positions, $skilltabs);
    }

    /** @test */
    public function it_exists()
    {
        $this->createHotbar();

        $this->assertInstanceOf(Hotbar::class, $this->hotbar);
        $this->assertInstanceOf(CharacterSkill::class, $this->hotbar->getPosition(4));
    }

    /** @test */
    public function it_can_set_position()
    {
        $this->createHotbar();

        $cs = $this->createMock(CharacterSkill::class);

        $this->hotbar->setPosition(1, $cs);
        $this->hotbar->setPosition(2, $cs);
        $this->hotbar->setPosition(8, $cs);
        $this->hotbar->setPosition(9, $cs);
        $this->assertEquals($cs, $this->hotbar->getPosition(2));
        $this->assertEquals($cs, $this->hotbar->getPosition(9));
    }

    /** @test */
    public function it_cannot_set_position_below_range()
    {
        $this->createHotbar();

        $this->expectException(Exception::class);

        $cs = $this->createMock(CharacterSkill::class);

        $this->hotbar->setPosition(0, $cs);
    }

    /** @test */
    public function it_cannot_set_position_above_range()
    {
        $this->createHotbar();

        $this->expectException(Exception::class);

        $cs = $this->createMock(CharacterSkill::class);

        $this->hotbar->setPosition(10, $cs);
    }

    /** @test */
    public function it_returns_false_if_get_position_has_nothing()
    {
        $this->hotbar = new Hotbar;
        $this->assertEquals(false, $this->hotbar->getPosition(4));
    }
}
