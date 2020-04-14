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

Route::middleware('guest')->get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/curl','HOmeController@curl');

Route::prefix('application')->name('application.')->middleware('auth')->group(function () {
    Route::get('/', function () { return view('application'); });
    Route::get('/{any}', function () { return view('application'); })->where('any', '.*')->name('home');
});

Route::middleware('auth')->prefix('messages')->name('messages.')->group(function () {
    Route::get('/', function () { return view('message'); });
    Route::get('/{any}', function () { return view('message'); })->where('any', '.*')->name('home');
});

Route::prefix('api')->name('api.')->group(function () {
    Route::get('getUser','ApiController@getUser');
    Route::get('getApplications','ApplicationController@all');
    Route::post('add_app','ApplicationController@create');
});

Route::prefix('chat')->name('chat.')->group(function () {
    Route::get('/', 'ChatsController@index');
    Route::get('messages', 'ChatsController@fetchMessages');
    Route::post('messages', 'ChatsController@sendMessage');
});

Route::prefix('profile')->name('profile.')->group(function () {
    Route::get('/{any}',function () { return view('profile.profile'); })->where('any', '.*');
    Route::get('/',function () { return view('profile.profile'); })->where('any', '.*');
    Route::post('/update/{id}','HomeController@EditProfile');
});


Route::prefix('settings')->name('settings.')->group(function () {
    Route::get('/{any}',function () { return view('settings'); })->where('any', '.*');
    Route::get('/',function () { return view('settings'); })->where('any', '.*');
    // Route::post('/update/{id}','HomeController@EditProfile');
});

Route::post('/password/update','PasswordController@update');
