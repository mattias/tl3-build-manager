<?php

namespace Tests\Feature\Helpers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SkillIconFetcherTest extends TestCase
{
    /** @test */
    public function it_can_create_icon_url()
    {
        $skillIconFetcher = new \App\Helpers\SkillIconFetcher;
        $icon1 = $skillIconFetcher->get('Dusk Mage', 'Light', 'Holy Fury');
        $icon2 = $skillIconFetcher->get('Forged', 'Bane', 'Spectral Spider');

        $expected1 = config('app.url').'/images/skills/dusk_mage_light_holy_fury.png';
        $expected2 = config('app.url').'/images/skills/relic_bane_spectral_spider.png';

        $this->assertEquals($expected1, $icon1);
        $this->assertEquals($expected2, $icon2);
    }

    /** @test */
    public function it_turns_special_characters_into_underscores()
    {
        $skillIconFetcher = new \App\Helpers\SkillIconFetcher;
        $icon = $skillIconFetcher->get('Dusk Mage', 'Light', 'Holy: \\\'Fury');

        $expected = config('app.url').'/images/skills/dusk_mage_light_holy____fury.png';

        $this->assertEquals($expected, $icon);
    }

    /** @test */
    public function it_can_do_basic_attacks()
    {
        $skillIconFetcher = new \App\Helpers\SkillIconFetcher;
        $icon = $skillIconFetcher->get('Dusk Mage', '', 'Basic Attack');

        $expected = config('app.url').'/images/skills/sword_basic_attack.png';

        $this->assertEquals($expected, $icon);
    }
}
