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
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::post('/edit_profile/{id}','HomeController@EditProfile')->name('edit_profile');
Route::get('/test', function(){
    return view('test');
});
Route::post('/curl','HOmeController@curl');

Route::prefix('application')->name('application.')->group(function () {
    Route::get('/{any}', function () { return view('application'); })->where('any', '.*')->name('home');
});


Route::prefix('api')->name('api.')->group(function () {
    Route::get('getUser','ApiController@getUser');
    Route::post('getApplications','ApplicationController@all');

});
