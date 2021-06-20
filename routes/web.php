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

Route::get('/', 'ContactController@index')->name('contacts');

Route::post('/contact', 'ContactController@store')->name('contact');
Route::get('/edit/{id?}', 'ContactController@edit_page')->name('edit_page');
Route::post('/edit/{id?}', 'ContactController@update')->name('edit_contact');
Route::delete('/delete/{id?}', 'ContactController@delete')->name('delete_contact');
