<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;
use LaravelJsonApi\Laravel\Facades\JsonApiRoute;
use LaravelJsonApi\Laravel\Http\Controllers\JsonApiController;

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

Route::group(['middleware' => 'auth:api'], function () {

    /*Route::get('user', function () {
        return request()->user();
    });
    Route::apiResource('artists', ArtistController::class)->only(['index', 'show']);
    Route::get('artists/{artist}/tracks', [ArtistController::class, 'tracks']);*/
});

JsonApiRoute::server('v1')->prefix('v1')->resources(function ($server) {

    $server->resource('artists', JsonApiController::class)
        ->readOnly()
        ->relationships(function ($relations) {
            $relations->hasMany('albums')->readOnly();
        });

    $server->resource('albums', JsonApiController::class)
        ->readOnly()
        ->relationships(function ($relations) {
            $relations->hasMany('tracks')->readOnly();
        });

    $server->resource('tracks', JsonApiController::class)
        ->readOnly();

});
