<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoriesController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('customers')->name('customers-')->group(function () {
    Route::get('/', [CustomerController::class, 'listView'])->name('list');
    Route::get('/add', [CustomerController::class, 'addView'])->name('add');
    Route::post('/save', [CustomerController::class, 'save'])->name('save');
});

Route::prefix('products')->name('products-')->group(function () {
    Route::get('/', [ProductController::class, 'listView'])->name('list');
    Route::get('/add', [ProductController::class, 'addView'])->name('add');
    Route::post('/save', [ProductController::class, 'save'])->name('save');
});

Route::prefix('product-categories')->name('product-categories-')->group(function () {
    Route::get('/', [ProductCategoriesController::class, 'listView'])->name('list');
    Route::get('/add', [ProductCategoriesController::class, 'addView'])->name('add');
    Route::post('/save', [ProductCategoriesController::class, 'save'])->name('save');
});


Route::get('/orders', function () {
    return view('pages.customers-list', ['columns'=>['name', 'email'], 'data'=>[['name'=>'Test Name', 'email'=>'email@test.com']]]);
})->name('orders-list');

Route::get('/users', function () {
    return view('pages.customers-list', ['columns'=>['name', 'email'], 'data'=>[['name'=>'Test Name', 'email'=>'email@test.com']]]);
})->name('users-list');

Route::get('/logs', function () {
    return view('pages.customers-list', ['columns'=>['name', 'email'], 'data'=>[['name'=>'Test Name', 'email'=>'email@test.com']]]);
})->name('log-activity');
