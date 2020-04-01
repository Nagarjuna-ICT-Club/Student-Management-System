<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PHPUnit\Util\Json;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('faculties', function () {
    $fac = array(['BscCSIT','BIT','BIM','BBM','BCA']);
    return $fac = json_encode($fac);
})->name('api.faculties');

Route::post('/buildCred','ApiController@BuildCred')->name('api.create_account');