<?php

namespace App\Http\Livewire;

use App\Helpers\BuildlinkParser;
use App\Helpers\SkillIconFetcher;
use Livewire\Component;

class Hotbar extends Component
{
    public $buildlink = '';
    public $hotbar = [];

    public function mount(BuildlinkParser $buildlinkParser, SkillIconFetcher $skillIconFetcher)
    {
        $characterBuild = $buildlinkParser->parse($this->buildlink);
        $hotbar = $characterBuild->getHotbar();
        for ($i = 0; $i < 9; $i++) {
            $this->hotbar[$i] = $skillIconFetcher->get(
                $characterBuild->getClass(),
                $hotbar->getPosition($i)->getTree(),
                $hotbar->getPosition($i)->getDisplayName()
            );
        }
    }

    public function render()
    {
        return view('livewire.hotbar');
    }
}
