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

Route::get('/', 'LoginController@index')->name('login');
Route::post('/postlogin', 'LoginController@authenticate');
Route::get('/register', 'LoginController@register')->name('register');
Route::post('/postregister', 'LoginController@postregister');

// API 
Route::get('/users-api', 'UserController@getApi')->name('user-api');
Route::post('/post-bank-account', 'UserController@getBankAccount')->name('post-bank-account');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    
    Route::get('/users', 'UserController@index')->name('user.list');
    Route::get('/user-create', 'UserController@create')->name('user.create');
    Route::post('/user-post', 'UserController@store')->name('user.store');
    Route::get('/user/{id}/edit', 'UserController@edit')->name('user.edit');
    Route::post('/user/{id}/update', 'UserController@update')->name('user.update');
    Route::get('/user/{id}/delete', 'UserController@destroy')->name('user.delete');

    Route::get('/change-password', 'UserController@ChangePassword')->name('user.ChangePassword');
    Route::post('/change-password', 'UserController@ChangePasswordUpdate')->name('user.ChangePasswordUpdate');

    Route::get('/terbilang', 'UserController@terbilang')->name('terbilang');
    Route::get('/swapping-variable', 'UserController@SwappingVariable')->name('swapping-variable');
});

Route::get('/logout', 'LoginController@logout')->name('logout');
