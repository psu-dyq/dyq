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
    if (Auth::user())
        return redirect('home');
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/account/verify', 'AccountController@verify')->name('account.verify');
Route::get('/account', 'AccountController@index')->name('account');
Route::post('/account', 'AccountController@index')->name('account');
Route::get('/account/password', 'AccountController@password')->name('account.password');
Route::post('/account/password', 'AccountController@password')->name('account.password');
Route::get('/user', 'UserController@index')->name('user');
Route::get('/user/addemployee/{id}', 'UserController@addEmployee')->name('user.addemployee');
Route::get('/user/deleteemployee/{id}', 'UserController@deleteEmployee')->name('user.deleteemployee');

