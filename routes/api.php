<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ReporterController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
| 
*/

// Route::get('/posts', [PostController::class, 'index']);

// Route::post('/posts/store', [PostController::class, 'store']);

// Route::get('/posts/{post}', [PostController::class, 'show']);

// Route::put('/posts/{post}/update', [PostController::class, 'update']);




Route::apiResource('/posts', PostController::class)->only('index');

Route::post('/registre', [ReporterController::class, 'store']);

Route::post('/register', [UserController::class, 'store']);

Route::post('/login', [UserController::class, 'login']);



 Route::middleware('auth:sanctum')->group(function(){

    Route::get('/user', function (Request $request) {
           return $request->user();
    });

    Route::apiResource('/posts', PostController::class)->except('index');

       

});

