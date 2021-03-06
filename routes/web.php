<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Livewire\Shop;

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


Route::group(['middleware' => 'auth:sanctum', 'verified'], function () {

	/* Logout */

	/* Shop links with Authentication */
	route::view('/shop', 'shop.index')->name('shop-main');
	Route::view('/shop/cart', 'shop.cart')->name('shop-cart');
	Route::view('/shop/search', 'shop.search')->name('product-search');

	// Dashboard - Employees
	Route::view('/dashboard/employees', 'dashboard.employees.index')->name('dashboard-employees-index');

	// Dashboard - Branches
	Route::view('/dashboard/branches', 'dashboard.branches.index')->name('dashboard-branches-index');

	/* Dashboard - Products */
	Route::view('/dashboard/products', 'dashboard.inventory.products.index')->name('dashboard-product-index');
	Route::view('/dashboard/products/show', 'dashboard.inventory.products.show')->name('dashboard-product-show');
	Route::view('/dashboard/categories', 'dashboard.inventory.categories.index')->name('dashboard-categories-index');
	Route::view('/dashboard/categories/show', 'dashboard.inventory.categories.show')->name('dashboard-categories-show');
	Route::view('/dashboard/stocks', 'dashboard.inventory.stocks.index')->name('dashboard-stocks-index');
	Route::view('/dashboard/stocks/show', 'dashboard.inventory.stocks.show')->name('dashboard-stocks-show');
	Route::get('./dashboard/stocks/show?{$branchId}', function() {
	    return view('dashboard.inventory.stocks.show');
	});
	Route::view('/dashboard/branches', 'dashboard.branches.index')->name('dashboard-branches-index');
	Route::view('/account', 'dashboard')->name('dashboard');
	Route::view('/dashboard', 'dashboard.main')->name('shop-dashboard');

	});

	/* Settings */
	Route::view('/dashboard/settings/', 'dashboard.settings')->name('settings');
