<?php

use App\Http\Controllers\Active\ConsumerController;
use App\Http\Controllers\Active\ProductController;
use App\Http\Controllers\Auth\AuthController;
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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
Route::get('profile', [AuthController::class, 'user']);

Route::group(['prefix' => 'v1'], function(){
    // Consumer
    Route::get('/consumer', [ConsumerController::class, 'getAllConsumer']);

    // CheckMiddleawre
    Route::post('/consumer/create', [ConsumerController::class, 'createConsumer']);
    Route::put('/consumer/update/{id}', [ConsumerController::class, 'changeConsumer']);
    Route::delete('/consumer/{id}', [ConsumerController::class, 'delete']);
    // Product
    Route::get('/product', [ProductController::class, 'getAllProcduct']);
    Route::post('/product/create', [ProductController::class, 'createProduct']);
    Route::put('/product/update/{id}', [ProductController::class, 'updateProduct']);
    Route::delete('/product/{id}', [ProductController::class, 'delete']);
});