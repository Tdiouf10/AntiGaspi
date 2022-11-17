<?php

use App\Models\Annonce;
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
    return view('welcome')->with('annonces', Annonce::all());
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

Route::post('/search', 'App\Http\Controllers\AnnonceController@search')->name('annonce.search');

Auth::routes();

Route::resource('annonces', 'App\Http\Controllers\AnnonceController')->only(['index']);


Route::group(['middleware' => 'auth'], function () {
    Route::resource('categories', 'App\Http\Controllers\CategoriesController')->only(['index']);
    Route::get('/profile', 'App\Http\Controllers\HomeController@editProfile')->name('user.edit-profil');
    Route::put('/profile', 'App\Http\Controllers\HomeController@updateProfile')->name('user.update-profil');
    Route::resource('annonces', 'App\Http\Controllers\AnnonceController')->only(['store', 'create']);
    Route::resource('annonces', 'App\Http\Controllers\AnnonceController')->only(['store', 'create']);

});
//
Route::group(['middleware' => 'admin'], function () {
    Route::resource('categories', 'App\Http\Controllers\CategoriesController')->only(['create', 'store', 'show', 'edit', 'update', 'destroy']);
    Route::resource('annonces', 'App\Http\Controllers\AnnonceController')->only([ 'show', 'edit', 'update', 'destroy']);

});
