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

Auth::routes();

Route::view('/', 'welcome');

Route::resource('messages', 'MessageController')->middleware('auth');

Route::get('{user}/messages/confirm/{message?}', 'MessageConfirmationController@create')->name('message.confirm')->middleware('auth');

Route::post('messages/confirm', 'MessageConfirmationController@store')->name('message.confirm.store')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');
