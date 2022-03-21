<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\TaskController;
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

Route::get('tasks', [TaskController::class, 'index']);
Route::get('tasks/{task}', [TaskController::class, 'show']);
Route::post('tasks', [TaskController::class, 'create']);
Route::put('tasks/{task}', [TaskController::class, 'update']);
Route::delete('tasks/{task}', [TaskController::class, 'destroy']);


Route::post('/users/create-account', [AuthenticationController::class, 'createAccount']);
Route::post('/users/login', [AuthenticationController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/users/profile', function(Request $request) {
        return auth()->user();
    });

    Route::post('/users/logout', [AuthenticationController::class, 'logout']);
});
