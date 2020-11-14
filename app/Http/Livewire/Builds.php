<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Livewire\WithPagination;

class Builds extends Component
{
    use WithPagination;

    public $builds = [];

    public function mount()
    {
        // TODO: Read from database
        // TODO: Create seed
    }

    public function render()
    {
        return view('livewire.builds');
    }
}
