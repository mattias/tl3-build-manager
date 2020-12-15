<?php

namespace App\Http\Livewire;

use App\Models\Build;
use Livewire\Component;
use Livewire\WithPagination;

class Leaderboards extends Component
{
    use WithPagination;

    public $headers = ['Build name', 'Username', 'Hotbar', 'Votes', 'Link'];
    public $search = '';

    public function updatingSearch()
    {
        $this->page = 1;
    }

    public function render()
    {
        return view('livewire.leaderboards', [
            'builds' => Build::search('name', $this->search)->paginate(5),
        ]);
    }
}
