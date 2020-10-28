<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Livewire\ShopApp;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('welcome');
})->name('auth.login');


/* Go to Transactions */
Route::get('/transactions', function () {
    return view('shop.index');
});

/* Product Retrieval */

/* Authentication -> Go to Dashboard if authenticated */
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('/dashboard/products', ProductController::class);
Route::resource('/dashboard/categories', ProductCategoryController::class);

/* Livewire Routes */