<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/customers', function () {
    return view('pages.customers-list', ['columns'=>['name', 'email'], 'data'=>[['name'=>'Test Name', 'email'=>'email@test.com']]]);
})->name('customers-list');

Route::get('/products', function () {
    return view('pages.customers-list', ['columns'=>['name', 'email'], 'data'=>[['name'=>'Test Name', 'email'=>'email@test.com']]]);
})->name('products-list');

Route::get('/orders', function () {
    return view('pages.customers-list', ['columns'=>['name', 'email'], 'data'=>[['name'=>'Test Name', 'email'=>'email@test.com']]]);
})->name('orders-list');

Route::get('/product-categories', function () {
    return view('pages.customers-list', ['columns'=>['name', 'email'], 'data'=>[['name'=>'Test Name', 'email'=>'email@test.com']]]);
})->name('product-categories-list');

Route::get('/users', function () {
    return view('pages.customers-list', ['columns'=>['name', 'email'], 'data'=>[['name'=>'Test Name', 'email'=>'email@test.com']]]);
})->name('users-list');
