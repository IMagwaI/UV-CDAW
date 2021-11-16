<?php

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

/* Route::get('/', function () {
    return view('index');
}); */
Route::get('/name/{name}',function($name){
    return "Welcome $name";
});
Route::get('/title/{title}', function ($title) {
    return "Welcome $title";
})->where('title', '[A-Za-z]+');

Route::get('/listefilm',function(){
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

Route::get('/projet',function(){
    return view('index');
}); 
Route::get('/movie-details',function(){
    return view('movie-details');
});
Route::get('/profil',function(){
    return view('profil');
});
Route::get('/playlist',function(){
    return view('playlist');
});
Route::get('/login',function(){
    return view('login');
});
