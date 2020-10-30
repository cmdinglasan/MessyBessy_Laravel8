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
})->name('home');


/* Go to Transactions */

/* Shop links with Authentication */
Route::view('/shop', 'shop.index')->middleware(['auth:sanctum', 'verified']);
Route::view('/shop/cart', 'shop.cart')->middleware(['auth:sanctum', 'verified'])->name('product-search');
Route::view('/shop/search', 'shop.search')->middleware(['auth:sanctum', 'verified'])->name('product-search');


Route::view('/account', 'dashboard')->middleware(['auth:sanctum', 'verified'])->name('dashboard');
Route::view('/dashboard', 'dashboard.main')->middleware(['auth:sanctum', 'verified']);

/* Product Retrieval */

/* Authentication -> Go to Dashboard if authenticated */

Route::resource('/dashboard/products', ProductController::class);
Route::resource('/dashboard/categories', ProductCategoryController::class);

/* Livewire Routes */