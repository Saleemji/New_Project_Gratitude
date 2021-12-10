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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('allQuestion','QuestionController@allQuestion')->name('allQuestion');
Route::post('addQuestion','QuestionController@store')->name('addQuestion');
Route::post('removeQuestion','QuestionController@removeQuestion')->name('removeQuestion');
Route::post('searchQuestion','QuestionController@searchQuestion')->name('searchQuestion');

