<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuizController;
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
            Route::get('/index/showed', [NewsController::class, 'indexShowed']);
            Route::post('/create', [NewsController::class, 'create']);
            Route::get('/detail/{id}', [NewsController::class, 'detail']);
            Route::post('/update/{id}', [NewsController::class, 'update']);
            Route::delete('/delete/{id}', [NewsController::class, 'delete']);
            Route::post('/restore/{id}', [NewsController::class, 'restore']);
            Route::post('/show/{id}', [NewsController::class, 'show']);
            Route::post('/hide/{id}', [NewsController::class, 'hide']);
            Route::post('create_notification/{id}', [NewsController::class, 'createNotification']);
            Route::post('update_notification/{id}', [NewsController::class, 'updateNotification']);
            Route::post('notification_now/{id}', [NewsController::class, 'notification']);
        });

        Route::prefix('quiz')->group(function () {
            Route::get('/index', [QuizController::class, 'index']);
            Route::post('/create', [QuizController::class, 'create']);
            Route::post('/update/{id}', [QuizController::class, 'update']);
            Route::get('/detail/{id}', [QuizController::class, 'detail']);
            Route::delete('/delete/{id}', [QuizController::class, 'delete']);
            Route::post('/answer/{id}', [QuizController::class, 'answer']);
            Route::get('/answer/detail/{id}', [QuizController::class, 'answerDetail']);
            Route::get('/result/{id}', [QuizController::class, 'quizResult']);
        });


        Route::prefix('dashboard')->group(function () {
            Route::get('/news', [DashboardController::class, 'index']);
            Route::get('/quiz', [DashboardController::class, 'indexQuiz']);
        });
    });
});
