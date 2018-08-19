<?php

use App\Item;

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

Route::get('/', 'HomeController@getIndex')->name('home')->middleware('auth');
Route::get('/home', 'HomeController@getIndex')->middleware('auth');
Route::post('/', 'HomeController@postIndex')->middleware('csrf');
Route::post('/home', 'HomeController@postIndex')->middleware('csrf');

Route::get('/done', 'HomeController@getDone')->name('done')->middleware('auth');
Route::post('/done', 'HomeController@postDone')->middleware('csrf');

Route::get('/new', 'HomeController@getNew')->name('new')->middleware('auth');
Route::post('/new', 'HomeController@postNew')->middleware('csrf');

Route::get('/edit/{task}', 'HomeController@getEdit')->name('edit')->middleware('auth');
Route::post('/edit/{task}', 'HomeController@postEdit')->middleware('csrf');

Route::get('/delete/{task}', 'HomeController@getDelete')->name('delete');
Route::bind('task', function($value, $route) {
    return Item::where('id', $value)->first();
});

Route::get('/login', 'AuthController@getLogin')->name('login');
Route::post('/login', 'AuthController@postLogin')->middleware('csrf');

Route::get('logout', 'AuthController@logout')->name('logout');

Route::get('/register', 'AuthController@getRegister')->name('register');
Route::post('/register', 'AuthController@postRegister')->middleware('csrf');