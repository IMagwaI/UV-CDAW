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

Route::put('/addedFilms/{id}', 'App\Http\Controllers\FilmController@update')->name('film_update');
Route::delete('/addedFilms/{id}', 'App\Http\Controllers\FilmController@destroy')->name('deleteFilm');


Route::get('/name/{name}', function ($name) {
    return "Welcome $name";
});
Route::get('/title/{title}', function ($title) {
    return "Welcome $title";
})->where('title', '[A-Za-z]+');

Route::get('/listefilm', function () {
    return "<!doctype html>
    <html lang='fr'>
      <head>
          <meta charset='UTF-8'>
          <title>Mauvaise façon</title>
      </head>
      <body>
          <p>Le fichier risque d'être longggggg</p>
      </body>
    </html>";
});

Route::get('/', function () {
    return view('home');
});
Route::get('/movie-details', function () {
    return view('movie-details');
})->name("movie-details");
Route::get('/ajoutFilm', function () {
    return view('ajoutFilm');
});

Route::get('/profil', function () {
    return view('profil');
})->name("profil");
Route::get('/playlist', function () {
    return view('playlist');
})->name('playlist');
Route::get('/login', function () {
    return view('login');
})->name('login');
