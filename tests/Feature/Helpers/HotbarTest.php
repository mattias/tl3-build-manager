<?php

namespace Tests\Feature\Helpers;

use App\Helpers\CharacterSkill;
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
        $cs = $this->createMock(CharacterSkill::class);
        $skills = [
            1 => $cs,
            3 => $cs,
            4 => $cs,
        ];
        $hotbar = new Hotbar(
            $skills
        );

        $this->assertInstanceOf(Hotbar::class, $hotbar);
        $this->assertEquals($skills[4], $hotbar->getPosition(4));
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
