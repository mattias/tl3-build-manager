<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Build extends Component
{
    public $name = '';
    public $link = 'https://tools.torchlightfansite.com/tlfskillcalculator/build-dm.html';

    public $builds = [];
    public $selected = [];

    protected $rules = [
        'name' => 'required',
        'link' => 'required',
    ];

    public function mount()
    {
        $this->selected = [
            'name' => 'Select a build',
        ];

        if (auth()->check()) // only when logged in
        {
            $this->builds = auth()->user()->builds->toArray();
        }
    }

    public function select($buildName)
    {
        foreach ($this->builds as $build) {
            if ($build['name'] === $buildName) {
                $this->selected = $build;
                $this->name = $build['name'];
                $this->link = $build['link'];
                break;
            }
        }
    }

    public function save()
    {
        $this->validate();

        auth()->user()->builds()->updateOrCreate(
            ['name' => $this->name],
            ['link' => $this->link]
        );

        $this->builds = auth()->user()->builds->toArray();
    }

    public function resetLink()
    {
        if ($buildStart = strpos($this->link, '?')) {
            $buildStart += 9; // Moves to the beginning of the data
            $beginning = substr($this->link, 0, $buildStart);
            $this->link = $beginning . '000000000000000000000000000000000;0;0;0';
        }
    }

    public function delete()
    {
        $this->validate();

        auth()->user()->builds()->where('name', $this->name)->delete();

        $this->resetLink();
        $this->name = '';
        $this->selected = [
            'name' => 'Select a build',
        ];

        $this->builds = auth()->user()->builds->toArray();
    }

    public function render()
    {
        return view('livewire.build');
    }
}
