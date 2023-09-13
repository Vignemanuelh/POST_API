<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::resource('posts', PostController::class)->only('index', 'create', 'store');

Route::get('/posts', [PostController::class, 'index'])->name('pindex');
Route::get('/create', [PostController::class, 'create'])->name('pcreate');
Route::post('/store', [PostController::class, 'store'])->name('pstore');
Route::get('/show/{id}', [PostController::class, 'show'])->name('pshow');
Route::get('/edit/{id}', [PostController::class, 'edit'])->name('pedit');
Route::post('/update/{id}', [PostController::class, 'update'])->name('pupdate');
Route::get('/destroy/{id}', [PostController::class, 'destroy'])->name('pdestroy');



Route::get('/', function () {
    return view('welcome');
});
