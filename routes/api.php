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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::apiResource('/class', 'Api\ClassController');
// Route::apiResource('/subject', 'Api\SubjectController');
// Route::resource('/student', 'Api\StudentController')->middleware('auth');working
// Route::resource('/student', 'Api\StudentController')->middleware('auth:api');

Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');

Route::group([

    'prefix' => 'v1',
    'middleware' => 'auth:api'

], function () {
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('payload', 'AuthController@payload');
    Route::resource('/student', 'Api\StudentController');
    Route::resource('/subject', 'Api\SubjectController');
});

// Route::resource('/student', 'Api\StudentController');

// Route::group([
//     'middleware' => 'jwt.auth'
// ], function () {
//     // Route::resource('/student', 'Api\StudentController');
//     Route::post('/student', 'Api\StudentController@show{id}');
// });
