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


Route::get('/', '\App\Http\Controllers\UrlController@index')->name('welcome');

Route::get('/register', '\App\Http\Controllers\AuthController@index')->name('register');
Route::post('/register/store', '\App\Http\Controllers\AuthController@register')->name('register.store');

Route::get('/login', '\App\Http\Controllers\AuthController@loginPage')->name('login');
Route::post('/login/store', '\App\Http\Controllers\AuthController@login')->name('login.store');


Route::post('/logout', '\App\Http\Controllers\AuthController@logout')->name('logout');


Route::get('/form', '\App\Http\Controllers\UrlController@form')->name('form')->middleware('auth');
Route::get('/list', '\App\Http\Controllers\UrlController@list')->name('url.list')->middleware('auth');
Route::post('/shorten', '\App\Http\Controllers\UrlController@store')->name('url.shorten')->middleware('auth');
Route::get('/{code}', '\App\Http\Controllers\UrlController@shortenUrl')->name('url.shorten.redirect')->middleware('auth');


