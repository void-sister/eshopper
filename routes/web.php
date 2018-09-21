<?php

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

Route::get('/', 'IndexPageController@index')->name('index');

Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');

Route::get('/cart', 'CartController@index')->name('cart.index');




Route::get('/blog-single', function () {
    return view('blog-single');
});
Route::get('/blog', function () {
    return view('blog');
});
Route::get('/checkout', function () {
    return view('checkout');
});
Route::get('/contact-us', function () {
    return view('contact-us');
});
Route::get('/login', function () {
    return view('login');
});
