<?php

use Illuminate\Support\Facades\Route;
use App\Models\Word;

use Livewire\Volt\Volt;

Route::group(['middleware' => ['auth', 'verified']], function () {
    Volt::route('/', 'words')->name('words');
    Volt::route('/add-words', 'add-words')->name('add-words');
    Volt::route('/archive', 'archived-words')->name('archived-words');
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
