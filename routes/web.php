<?php

use Illuminate\Support\Facades\Route;

Route::get('/builds', \App\Http\Livewire\Builds::class)->name('builds');

Route::get('/skills', \App\Http\Livewire\Skills::class)->name('skills');
