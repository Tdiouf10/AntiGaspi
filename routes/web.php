<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers;
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
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/annonces', 'App\Http\Controllers\AnnonceController@index')->name('annonce.index');
Route::get('/annonce', 'App\Http\Controllers\AnnonceController@create')->name('annonce.create');
Route::post('/annonce/create', 'App\Http\Controllers\AnnonceController@store')->name('annonce.store');
Route::post('/search', 'App\Http\Controllers\AnnonceController@seach')->name('annonce.search');
