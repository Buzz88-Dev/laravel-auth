<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('guests.home');
})->name('home');

Auth::routes();

// Route::get('/admin', 'HomeController@index')->name('admin');
// Route::resource('posts', 'Admin\PostController');  // post è il nome della tabella del database, nonche nome del percorso

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', 'AdminController@dashboard')->name('dashboard');
        Route::resource('posts', 'PostController');  // tutti i controlli che si trovano in PostController si trovano sotto la cartella Admin; il nome viene indicato in ->namespace('Admin')
    });
// con questo codice definisco i prefissi
