<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BuildsTest extends TestCase
{
    /** @test */
    public function build_page_renders_livewire_component()
    {
        $this->get('/builds')
            ->assertSuccessful()
            ->assertSeeLivewire('builds');
    }
}
