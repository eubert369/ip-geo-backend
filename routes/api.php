<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HistoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('register', [AuthController::class, 'register'])->withoutMiddleware('jwt');
    Route::post('login', [AuthController::class, 'login'])->withoutMiddleware('jwt');
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('me', [AuthController::class, 'me']);

});

Route::post('/history/create', [HistoryController::class, 'store']);
Route::get('/history', [HistoryController::class, 'all']);