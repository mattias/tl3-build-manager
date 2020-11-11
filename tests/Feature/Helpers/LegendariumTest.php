<?php

namespace Tests\Feature\Helpers;

use App\Helpers\Legendarium;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LegendariumTest extends TestCase
{
    /** @test */
    public function it_exists()
    {
        $displayName = 'Legendary';
        $description = 'abc';
        $legendarium = new Legendarium(
            $displayName,
            $description
        );

        $this->assertInstanceOf(Legendarium::class, $legendarium);
        $this->assertEquals($displayName, $legendarium->getDisplayName());
        $this->assertEquals($description, $legendarium->getDescription());
    }
}
