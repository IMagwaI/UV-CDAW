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
Route::get('addedFilms', 'App\Http\Controllers\FilmController@index')->name('addedFilms');



Route::post('addFilm', 'App\Http\Controllers\FilmController@store')->name('addFilm_store');
Route::get('addMedia', 'App\Http\Controllers\FilmController@index')->name('addMediaPage');

Route::get('playlists', 'App\Http\Controllers\PlaylistController@index')->name('playlists');
Route::get('playlist/{id}', 'App\Http\Controllers\PlaylistController@show')->name('playlist-details');
Route::get('addToPlaylist/{mediaId}', 'App\Http\Controllers\PlaylistController@showAddToPlaylist')->name('add-to-playlist');
Route::post('addToPlaylist/{mediaId}', 'App\Http\Controllers\PlaylistController@addToPlaylist')->name('post-to-playlist');
Route::get('deleteFromPlaylist/{mediaId}/{playlistId}', 'App\Http\Controllers\PlaylistController@deleteFromPlaylist')->name('delete-from-playlist');
Route::get('deletePlaylist/{id}', 'App\Http\Controllers\PlaylistController@destroy')->name('delete-playlist');
Route::get('addPlaylist', 'App\Http\Controllers\PlaylistController@create')->name('addPlaylist');
Route::post('addPlaylist', 'App\Http\Controllers\PlaylistController@store')->name('addPlaylist_store');

//admin routes
Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('admin');
Route::get('/admin/removeAdmin/{id}', 'App\Http\Controllers\AdminController@removeAdmin')->name('removeAdmin');
Route::get('/admin/addAdmin/{id}', 'App\Http\Controllers\AdminController@addAdmin')->name('addAdmin');
Route::get('/admin/banDebanUser/{id}', 'App\Http\Controllers\AdminController@banDebanUser')->name('banDebanUser');

Route::get('favoris', 'App\Http\Controllers\FavoriController@index')->name('favoris');
// get instead of post to submit from anchor tag
Route::get('addFavoris/{id}', 'App\Http\Controllers\FavoriController@store')->name('addFavoris');
Route::get('deleteFavoris/{id}', 'App\Http\Controllers\FavoriController@destroy')->name('deleteFavoris');

Route::get('historique', 'App\Http\Controllers\HistoriqueController@index')->name('historique');
Route::get('addHistorique/{id}', 'App\Http\Controllers\HistoriqueController@store')->name('addHistorique');
Route::get('deleteHistorique/{id}', 'App\Http\Controllers\HistoriqueController@destroy')->name('deleteHistorique');

Route::post('/addComment/{id_user}/{id_film}', 'App\Http\Controllers\CommentController@saveComment')->name('addComment');
Route::get('/commentsPagination/{id_film}', 'App\Http\Controllers\CommentController@paginate')->name('commentsPagination');
// update comment
Route::get('/updateComment/{id_comment}/{media_id}', 'App\Http\Controllers\CommentController@updateComment')->name('updateComment');
Route::get('/deletecomment/{id_comment}/{id_film}', 'App\Http\Controllers\CommentController@deleteComment')->name('deleteComment');

Route::post('/addedFilms/{id}', 'App\Http\Controllers\FilmController@edit')->name('film_update');
Route::delete('/addedFilms/{id}', 'App\Http\Controllers\FilmController@destroy')->name('deleteFilm');
Route::post('/updateFilm/{id}', 'App\Http\Controllers\FilmController@update')->name('updateFilm_put');
Route::post('/search', 'App\Http\Controllers\HomeController@searchByTitle')->name('search');

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
// Route::get('/playlists', function () {
//     if (Auth::check()) {
//         return view('playlists');
//         // The user is logged in...
//     } else {
//         return redirect()->action([HomeController::class, 'populate']);
//     }
// })->name('playlists');
/* Route::get('/login', function () {
    return view('login');
})->name('login'); */

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
