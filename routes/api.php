<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/**
 * Routes to handle API requests.
 */

# Task 1
Route::post('/register-person', 'PersonController@create');

# Task 2
Route::post('/signup', 'UserController@signup');

# Task 3
Route::middleware('auth:api')->post('/user/status', 'UserController@handleStatus');
