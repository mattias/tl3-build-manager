<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Build extends Component
{
    public $name = '';
    public $link = 'https://tools.torchlightfansite.com/tlfskillcalculator/build-dm.html';

    protected $rules = [
        'name' => 'required',
        'link' => 'required',
    ];

    public function save()
    {
        auth()->user()->builds()->create(
            $this->validate()
        );
    }

    public function resetLink()
    {
        $buildStart = strpos($this->link, '?');
        $buildStart += 9; // Moves to the beginning of the data
        $beginning = substr($this->link, 0, $buildStart);
        $this->link = $beginning . '000000000000000000000000000000000;0;0;0';
    }

    public function render()
    {
        return view('livewire.build');
    }
}
