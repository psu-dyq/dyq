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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/verify', 'User@verify')->name('user.verify');
Route::get('/user', 'User@index')->name('user');
Route::get('/user/password', 'User@password')->name('user.password');
Route::post('/user/password', 'User@password')->name('user.password');

