<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/blog', function (Request $request) {
    return $request->user();
});
Route::prefix('blog')->group(function() {
    Route::get('/', 'BlogController@index');
    Route::post('/store', 'BlogController@store');
    Route::get('/get-all', 'BlogController@getAll');
    Route::delete('/delete/{id}', 'BlogController@destroy');
    Route::put('/update/{id}', 'BlogController@update');
});