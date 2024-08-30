<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/', [ProductController::class, 'index'])->name('index');

Route::get('/product/{id}/details', [ProductController::class, 'details'])->name('productDetails');
Route::get('/product/create', [ProductController::class, 'create'])->name('productCreate');
Route::post('/product/create', [ProductController::class, 'store']);
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('productEdit');
Route::post('/product/{id}/edit', [ProductController::class, 'update']);
