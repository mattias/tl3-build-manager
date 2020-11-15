<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire\Livewire;

class LeaderboardsTest extends TestCase
{
    use RefreshDatabase;
    protected $seed = true;

    /** @test */
    public function leaderboard_page_renders_livewire_component()
    {
        $this->get('/leaderboards')
            ->assertSuccessful()
            ->assertSeeLivewire('leaderboards');
    }

    /** @test */
    public function it_shows_leaderboards_from_database()
    {
        Livewire::test('leaderboards')
            ->assertSee('https://tools.torchlightfansite.com/tlfskillcalculator');
    }
}
