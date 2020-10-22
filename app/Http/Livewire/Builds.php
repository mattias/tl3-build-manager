<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Kreait\Firebase\Firestore;

class Builds extends Component
{
    public $builds;

    public function mount(Firestore $firestore)
    {
        $db = $firestore->database();
        dd($db->collections('Builds')->documents());
    }

    public function render()
    {
        return view('livewire.builds');
    }
}
