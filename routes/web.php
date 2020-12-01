<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/register', \App\Http\Livewire\Auth\Register::class);
Route::get('/login', \App\Http\Livewire\Auth\Login::class);
Route::get('/logout', function() {
    Auth::logout();
    return redirect()->to('build');
});

Route::get('/', function() {
    return redirect()->to('build');
})->name('home');

Route::get('/leaderboards', \App\Http\Livewire\Leaderboards::class)->name('leaderboards');

Route::get('/build', \App\Http\Livewire\Build::class)->name('build');
