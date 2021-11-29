<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\listeMediasController;
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



Route::get('/tami', 'App\Http\Controllers\listeMediasController@index')->name('welcome');
Route::get('/cats', 'App\Http\Controllers\listeMediasController@getCategories')->name('getem');
Route::get('/films', 'App\Http\Controllers\FilmController@index')->name('films');
Route::get('addFilm', 'App\Http\Controllers\FilmController@create')->name('addFilm');
Route::post('addFilm', 'App\Http\Controllers\FilmController@store')->name('addFilm_store');
Route::get('addedFilms', 'App\Http\Controllers\FilmController@index')->name('addedFilms');

Route::post('/addedFilms/{id}', 'App\Http\Controllers\FilmController@edit')->name('film_update');
Route::delete('/addedFilms/{id}', 'App\Http\Controllers\FilmController@destroy')->name('deleteFilm');
Route::post('/updateFilm/{id}', 'App\Http\Controllers\FilmController@update')->name('updateFilm_put');

Route::get('/','App\Http\Controllers\HomeController@populate' )->name('home');

/* Route::get('/movie-details', 'App\Http\Controllers\MoviePageController@index')->name('movie-details');
 */
Route::get('/movie-details/{id}', 'App\Http\Controllers\MoviePageController@show')->name('movie-details-show');

Route::get('/ajoutFilm', function () {
    return view('ajoutFilm');
});
Route::post('/profil/{id}', 'App\Http\Controllers\UserController@update')->name("update_profil");

Route::get('/profil', 'App\Http\Controllers\UserController@index')->name("profil");
Route::get('/playlist', function () {
    return view('playlist');
})->name('playlist');
/* Route::get('/login', function () {
    return view('login');
})->name('login'); */ 

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
