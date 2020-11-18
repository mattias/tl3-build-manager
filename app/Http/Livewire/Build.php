<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Build extends Component
{
    public $name = '';
    public $link = 'https://tools.torchlightfansite.com/tlfskillcalculator/build-dm.html';

    public $builds = [];

    protected $rules = [
        'name' => 'required',
        'link' => 'required',
    ];

    public function mount()
    {
        if(auth()->check()) // only when logged in
        {
            $this->builds = auth()->user()->builds->toArray();
        }
    }

    public function save()
    {
        $this->validate();

        auth()->user()->builds()->updateOrCreate(
            ['name' => $this->name],
            ['link' => $this->link]
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
