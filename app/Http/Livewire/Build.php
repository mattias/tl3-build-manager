<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Build extends Component
{
    public $name = '';
    public $lastLink = 'https://tools.torchlightfansite.com/tlfskillcalculator/build-dm.html';
    public $link = 'https://tools.torchlightfansite.com/tlfskillcalculator/build-dm.html';

    public $builds = [];
    public $selected = [];

    protected $rules = [
        'name' => 'required',
        'link' => 'required',
    ];

    public function mount()
    {
        // Temporary while testing
        $user = User::find(1);
        Auth::login($user, true);

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
                $this->lastLink = $this->link;
                $this->link = $build['link'];
                break;
            }
        }
    }

    public function save()
    {
        if (!$this->linkHasChanged()) {
            $this->dispatchBrowserEvent('notify', 'You first have to click "click to copy" in the skill calculator before you can save.');
            return;
        }

        $this->validate();

        auth()->user()->builds()->updateOrCreate(
            ['name' => $this->name],
            ['link' => $this->link]
        );

        $this->builds = auth()->user()->builds->toArray();
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

    private function linkHasChanged(): bool
    {
        return $this->link !== $this->lastLink;
    }
}
