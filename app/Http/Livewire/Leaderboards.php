<?php

namespace App\Http\Livewire;

use App\Models\Builds;
use Livewire\Component;
use Livewire\WithPagination;

class Leaderboards extends Component
{
    use WithPagination;

    public $headers = ['Build', 'Hotbar', 'Votes', 'Link'];

    public function render()
    {
        return view('livewire.leaderboards', [
            'builds' => Builds::paginate(5),
        ]);
    }
}
