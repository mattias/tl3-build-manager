<?php

use Illuminate\Support\Facades\Route;

Route::get('/register', \App\Http\Livewire\Auth\Register::class);

Route::get('/leaderboards', \App\Http\Livewire\Leaderboards::class)->name('leaderboards');

Route::get('/build', \App\Http\Livewire\Build::class)->name('build');
