<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\DashboardController;

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


Route::prefix('v1')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'create']);

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::get('/logout', [AuthController::class, 'logout']);
        Route::get('/profile', [AuthController::class, 'profile']);

        Route::prefix('news')->group(function () {
            Route::get('/index', [NewsController::class, 'index']);
            Route::post('/create', [NewsController::class, 'create']);
            Route::get('/detail/{id}', [NewsController::class, 'detail']);
            Route::post('/update/{id}', [NewsController::class, 'update']);
            Route::delete('/delete/{id}', [NewsController::class, 'delete']);
            Route::post('/restore/{id}', [NewsController::class, 'restore']);
            Route::post('/show/{id}', [NewsController::class, 'show']);
            Route::post('/hide/{id}', [NewsController::class, 'hide']);
            Route::post('create_notification/{id}', [NewsController::class, 'createNotification']);
            Route::post('update_notification/{id}', [NewsController::class, 'updateNotification']);
        });

        Route::prefix('dashboard')->group(function () {
            Route::get('/news', [DashboardController::class, 'index']);
        });
    });
});
