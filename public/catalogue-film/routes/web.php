<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
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

Route::post('/addComment/{id_user}/{id_film}', 'App\Http\Controllers\CommentController@saveComment')->name('addComment');

Route::post('/addedFilms/{id}', 'App\Http\Controllers\FilmController@edit')->name('film_update');
Route::delete('/addedFilms/{id}', 'App\Http\Controllers\FilmController@destroy')->name('deleteFilm');
Route::post('/updateFilm/{id}', 'App\Http\Controllers\FilmController@update')->name('updateFilm_put');

/* Route::get('/home', 'App\Http\Controllers\HomeController@showAllMedias')->name('showAllMedias');
 */
Route::get('/movieType/{type}', 'App\Http\Controllers\HomeController@getMediaByType')->name('getMediaByType');
Route::get('/', 'App\Http\Controllers\HomeController@populate')->name('home');

/* Route::get('/movie-details', 'App\Http\Controllers\MoviePageController@index')->name('movie-details');
 */
Route::get('/movie-details/{id}', 'App\Http\Controllers\MoviePageController@show')->name('movie-details-show');

Route::get('/ajoutFilm', function () {
    return view('ajoutFilm');
});
Route::post('/profil/{id}', 'App\Http\Controllers\UserController@update')->name("update_profil");

Route::get('/profil', 'App\Http\Controllers\UserController@index')->name("profil");
Route::get('/playlist', function () {
    if (Auth::check()) {
        return view('playlist');
        // The user is logged in...
    } else {
        return redirect()->action([HomeController::class, 'populate']);
    }
})->name('playlist');
/* Route::get('/login', function () {
    return view('login');
})->name('login'); */

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
