<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Leaderboards extends Component
{
    use WithPagination;

    public $headers = ['Build', 'Hotbar', 'Votes', 'Link'];
    public $builds = [];

    public function mount()
    {
        // TODO: Read from database
        // TODO: Create seed
    }

    public function render()
    {
        return view('livewire.leaderboards');
    }
}
