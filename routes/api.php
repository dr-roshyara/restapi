<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1;


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

Route::apiResource('/products','ProductController');
Route::group(['prefix'=>'products'],function(){
    Route::apiResource('/{products}/reviews','ReviewController');
});
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', '\App\Http\Controllers\Api\V1\AuthController@login');
    Route::get('login', function(){
         return "test";
    });
    // Route::post('signup', 'AuthController@signup');
 
    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::get('logout', '\App\Http\Controllers\Api\V1\AuthController@logout');
        // Route::get('user', 'AuthController@user');
    });
});