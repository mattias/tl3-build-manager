<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Kreait\Firebase\Firestore;

class Builds extends Component
{
    public $builds;

    public function render()
    {
        return view('livewire.builds');
    }
}
