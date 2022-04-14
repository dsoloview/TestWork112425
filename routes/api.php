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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('api.key')->group(function () {
    Route::apiResources(['shops' => \App\Http\Controllers\api\v1\ShopApiController::class]);
    Route::apiResources(['products' => \App\Http\Controllers\api\v1\ProductApiController::class]);
});


