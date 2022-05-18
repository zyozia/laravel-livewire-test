<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Client\Form;
use App\Http\Livewire\Manager\Feedbacks;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group([] , function () {
    Route::get('/form', Form::class)
        ->middleware(['auth', 'role:client'])
        ->name('client.form');
});
Route::group([] , function () {
    Route::get('/feedbacks', Feedbacks::class)
        ->middleware(['auth', 'role:manager'])
        ->name('manager.feedback');
});

