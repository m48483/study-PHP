<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardsController;
use App\Http\Controllers\CommentController;

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
Route::get('/boards', [BoardsController::class, 'index']);
Route::get('/boards/{id}', [BoardsController::class, 'show']);
Route::post('/boards', [BoardsController::class, 'store']);
Route::put('/boards/{id}', [BoardsController::class, 'update']);
Route::delete('/boards/{id}', [BoardsController::class, 'destroy']);

Route::get('/boards/{board_id}/comments', [CommentController::class, 'index']);
Route::post('/boards/{board_id}/comments', [CommentController::class, 'store']);
Route::put('/boards/{board_id}/comments/{id}', [CommentController::class, 'update']);
Route::delete('/boards/{board_id}/comments/{id}', [CommentController::class, 'destroy']);
