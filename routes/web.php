<?php

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

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('login');
})->name('register');

Route::resource('ansprechpartnerliste', 'AnsprechpartnerlisteController');
Route::resource('ansprechpartner','AnsprechpartnerController');
Route::resource('firmen', 'FirmenController', ['parameters' => ['firmen' => 'firmen']]);
Route::resource('praktika','PraktikaController');
Route::resource('praktikazeitraeume', 'PraktikazeitraeumeController');
Route::resource('semester','SemesterController');
Route::resource('teilnehmer','TeilnehmerController');
Route::resource('berufsziel', 'BerufszielController');
Route::resource('kontaktliste', 'KontaklisteController');
Route::resource('user', 'UserController');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'WelcomeController@index')->name('welcome');
