<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire\Livewire;

class BuildsTest extends TestCase
{
    use RefreshDatabase;
    protected $seed = true;

    /** @test */
    public function build_page_renders_livewire_component()
    {
        $this->get('/builds')
            ->assertSuccessful()
            ->assertSeeLivewire('builds');
    }

    /** @test */
    public function it_shows_builds_from_database()
    {
        Livewire::test('builds')
            ->assertSee('https://tools.torchlightfansite.com/tlfskillcalculator');
    }
}
