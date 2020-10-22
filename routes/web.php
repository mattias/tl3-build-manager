<?php

use Illuminate\Support\Facades\Route;

Route::get('/builds', \App\Http\Livewire\Builds::class)->name('builds');
