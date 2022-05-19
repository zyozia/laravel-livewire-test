<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Client\Form;
use App\Http\Livewire\Manager\Feedbacks;
use Illuminate\Http\Request;
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
    return redirect()->route('home');
});

require __DIR__.'/auth.php';

Route::group(['middleware' => 'auth'] , function () {

    Route::get('/home', function (Request $request) {
       if ($request->user()->isManager()) {
           return redirect()->route('manager.feedback');
       }

        return redirect()->route('client.form');
    })->name('home');

    Route::get('/form', Form::class)
        ->middleware(['role:client'])
        ->name('client.form');

    Route::get('/feedbacks', Feedbacks::class)
        ->middleware(['role:manager'])
        ->name('manager.feedback');
});

