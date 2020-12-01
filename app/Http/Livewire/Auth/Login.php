<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $loginError = '';

    public function login()
    {
        if(Auth::attempt([
            'email' => $this->email,
            'password' => $this->password
        ]))
        {
            return redirect()->intended('/');
        }

        $this->loginError = 'Email or password is invalid.';
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
