<?php

use App\Http\Controllers;
use App\Models\Annonce;
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
Auth::routes();

Route::get('/apropos', function () {
    return view('apropos');
});

Route::get('/nouscontacter', function () {
    return view('nouscontacter');
});

Route::get('/', function () {
    return view('welcome')->with('annonces', Annonce::all());
})->name('welcome');


Route::group(['middleware' => 'auth'], function () {
    Route::resource('categories', 'App\Http\Controllers\CategoriesController')->only(['index']);
    Route::resource('annonces', 'App\Http\Controllers\AnnonceController')->only(['index', 'store', 'create', 'show', 'edit', 'update', 'destroy']);
    Route::get('annonce/{id}', 'App\Http\Controllers\AnnonceController@detail')->name('annonce.detail');
    Route::get('/profile', 'App\Http\Controllers\HomeController@editProfile')->name('user.edit-profil');
    Route::put('/profile', 'App\Http\Controllers\HomeController@updateProfile')->name('user.update-profil');
    Route::get('/search', [Controllers\AnnonceController::class, 'search']);
});

Route::group(['middleware' => 'admin'], function () {
    Route::resource('categories', 'App\Http\Controllers\CategoriesController')->only(['create', 'store', 'show', 'edit', 'update', 'destroy']);
    Route::resource('users', 'App\Http\Controllers\Admin\UserController')->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
