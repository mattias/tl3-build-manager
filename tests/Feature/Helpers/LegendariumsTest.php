<?php

namespace Tests\Feature\Helpers;

use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LegendariumsTest extends TestCase
{
    /** @test */
    public function it_must_be_initialized_before_usage()
    {
        $this->expectException(Exception::class);
        \App\Helpers\Legendariums::clear(); // Because tests triggers it
        \App\Helpers\Legendariums::getLegendariumById(1);
    }

    /** @test */
    public function it_can_get_legendarium_by_id()
    {
        \App\Helpers\Legendariums::init();
        $this->assertEquals('3C#7R4 Repeater', \App\Helpers\Legendariums::getLegendariumById(1)->getDisplayName());
        $this->assertEquals('Wingspan', \App\Helpers\Legendariums::getLegendariumById(65)->getDisplayName());
    }
}
