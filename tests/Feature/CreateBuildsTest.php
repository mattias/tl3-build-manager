<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CreateBuildsTest extends TestCase
{
    use RefreshDatabase;
    protected $seed = true;

    /** @test */
    public function build_page_renders_livewire_component()
    {
        $this->get('/build')
            ->assertSuccessful()
            ->assertSeeLivewire('build');
    }

    /** @test */
    public function it_can_save_build_to_database()
    {
        $user = \App\Models\User::factory()->create([
            'email' => 'builder@example.com'
        ]);

        $name = 'My awesome build';
        $link = 'https://tools.torchlightfansite.com/tlfskillcalculator/build-forged.html?build=221234567765413210000101014mga08713;28;16;45';

        Livewire::actingAs($user)->test('build')
            ->set('name', $name)
            ->set('link', $link)
            ->call('save');

        $build = $user->builds()->first();

        $this->assertEquals($name, $build->name);
        $this->assertEquals($link, $build->link);
    }

    /** @test */
    public function it_can_reset_build()
    {
        $user = \App\Models\User::factory()->create([
            'email' => 'builder@example.com'
        ]);
        $name = 'My awesome build';
        $link = 'https://tools.torchlightfansite.com/tlfskillcalculator/build-forged.html?build=221234567765413210000101014mga08713;28;16;45';

        Livewire::actingAs($user)->test('build')
            ->set('name', $name)
            ->set('link', $link)
            ->call('resetLink')
            ->assertSet('link', 'https://tools.torchlightfansite.com/tlfskillcalculator/build-forged.html?build=22000000000000000000000000000000000;0;0;0');
    }

    /** @test */
    public function it_does_not_try_to_reset_if_already_reset()
    {
        $user = \App\Models\User::factory()->create([
            'email' => 'builder@example.com'
        ]);
        $name = 'My awesome build';
        $link = 'https://tools.torchlightfansite.com/tlfskillcalculator/build-forged.html';

        Livewire::actingAs($user)->test('build')
            ->set('name', $name)
            ->set('link', $link)
            ->call('resetLink')
            ->assertSet('link', 'https://tools.torchlightfansite.com/tlfskillcalculator/build-forged.html');
    }

    /** @test */
    public function it_has_previously_saved_builds_on_mount()
    {
        $user = \App\Models\User::find(1);
        $builds = $user->builds->toArray();

        Livewire::actingAs($user)->test('build')
            ->assertSet('builds', $builds);
    }

    /** @test */
    public function it_can_delete_a_build()
    {
        $user = \App\Models\User::factory()->create([
            'email' => 'builder@example.com'
        ]);

        $name = 'My awesome build';
        $link = 'https://tools.torchlightfansite.com/tlfskillcalculator/build-forged.html?build=221234567765413210000101014mga08713;28;16;45';

        $buildData = [
            'user_id' => $user->id,
            'name' => $name,
            'link' => $link,
        ];

        \App\Models\Build::factory()->create($buildData);

        $this->assertDatabaseHas('builds', $buildData);

        Livewire::actingAs($user)->test('build')
            ->set('name', $name)
            ->set('link', $link)
            ->call('delete')
            ->assertSet('link', 'https://tools.torchlightfansite.com/tlfskillcalculator/build-forged.html?build=22000000000000000000000000000000000;0;0;0');

        $this->assertDatabaseMissing('builds', $buildData);
    }
}
