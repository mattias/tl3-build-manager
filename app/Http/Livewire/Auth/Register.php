<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class Register extends Component
{

    public $email = '';
    public $password = '';
    public $passwordConfirmation = '';

    public function register()
    {

    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
