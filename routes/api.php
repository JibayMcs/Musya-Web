<?php

use App\Http\Controllers\Api\ArtistController;
use App\Http\Controllers\Api\AuthController;
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

Route::group(['prefix' => 'v1'], function () {
    Route::post('auth/login', [AuthController::class, 'login']);
    Route::post('auth/register', [AuthController::class, 'register']);
    Route::get('auth/callback', [AuthController::class, 'callback']);
    Route::get('auth/test', function () {
        return response()->json(json_encode(['caca' => 'pipi']));
    });
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'v1'], function () {
    Route::get('user', function () {
        return request()->user();
    });
    Route::apiResource('artists', ArtistController::class)->only(['index', 'show']);
});
