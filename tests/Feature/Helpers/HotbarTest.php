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
    /** @test */
    public function it_exists()
    {
        $buildlink = "https://tools.torchlightfansite.com/tlfskillcalculator/build-dm.html?build=13156723471642531000010010cfhap8614;1;28;33";

        $tree1Points = [1, 5, 6, 7, 2, 3, 4];
        $tree1 = new CharacterSkillTab("Light", $tree1Points);

        $tree2Points = [7, 1, 6, 4, 2, 5, 3];
        $tree2 = new CharacterSkillTab("Dark", $tree2Points);

        // TODO: Either sort or not sort. Need to map all skill trees if we sort, which I just removed...
        $relicPoints = [1, 0, 0, 0, 0, 1, 0, 0, 1, 0];
        $relicTree = new CharacterSkillTab("Blood Drinker", $relicPoints);

        $skilltabs = [
            $tree1,
            $tree2,
            $relicTree,
        ];

        $positions = [12, 15, 17, 10, 25, 8, 6, 1, 4];
        $hotbar = new Hotbar($positions, $skilltabs);

        $this->assertInstanceOf(Hotbar::class, $hotbar);
        dd($hotbar->getPosition(4));
        //$this->assertEquals($skills[4], $hotbar->getPosition(4));
    }

    /** @test */
    public function it_can_set_position()
    {
        $hotbar = new Hotbar;
        $cs = $this->createMock(CharacterSkill::class);

        $hotbar->setPosition(1, $cs);
        $hotbar->setPosition(2, $cs);
        $hotbar->setPosition(8, $cs);
        $hotbar->setPosition(9, $cs);
        $this->assertEquals($cs, $hotbar->getPosition(2));
        $this->assertEquals($cs, $hotbar->getPosition(9));
    }

    /** @test */
    public function it_cannot_set_position_below_range()
    {
        $this->expectException(Exception::class);

        $hotbar = new Hotbar;
        $cs = $this->createMock(CharacterSkill::class);

        $hotbar->setPosition(0, $cs);
    }

    /** @test */
    public function it_cannot_set_position_above_range()
    {
        $this->expectException(Exception::class);

        $hotbar = new Hotbar;
        $cs = $this->createMock(CharacterSkill::class);

        $hotbar->setPosition(10, $cs);
    }

    /** @test */
    public function it_returns_false_if_get_position_has_nothing()
    {
        $hotbar = new Hotbar;

        $this->assertEquals(false, $hotbar->getPosition(4));
    }
}
