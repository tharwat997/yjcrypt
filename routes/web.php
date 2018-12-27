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
    return redirect()->route('login');
});

Route::get('/home', function (){
    return redirect()->route('home');
    });


Auth::routes();

Route::get('/inbox', 'HomeController@index')->name('home');
Route::get('/compose', 'ComposeController@index')->name('compose.view');
Route::post('/compose/store', 'ComposeController@store')->name('compose.store');
Route::get('/inbox/message/{id}', 'MessagesController@view')->name('message.view');
Route::get('/inbox/message-decrypt/{id}', 'MessagesController@decrypt')->name('message.decrypt');
Route::get('/inbox/message-decryption-attempts/{id}', 'MessagesController@attempts')->name('message.decryption.attempts');
Route::get('/inbox/message-decryption-successful/{id}', 'MessagesController@decryptionSuccess')->name('message.decryption.success');
