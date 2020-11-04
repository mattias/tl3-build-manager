<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BuildHotbar extends Component
{
    public $buildlink = '';
    public $hotbar = [
        '/images/relics/relic_blooddrinker_bloodletter.png',
        '/images/relics/relic_blooddrinker_danceofdeath.png',
        '/images/relics/relic_blooddrinker_livingbarrier.png',
        '/images/relics/relic_blooddrinker_bloodletter.png',
        '/images/relics/relic_blooddrinker_bloodletter.png',
        '/images/relics/relic_blooddrinker_bloodletter.png',
        '/images/relics/relic_blooddrinker_bloodseekers.png',
        '/images/relics/relic_blooddrinker_bloodletter.png',
        '/images/relics/relic_blooddrinker_spinningblade.png',
    ];

    public function render()
    {
        return view('livewire.build-hotbar');
    }
}
