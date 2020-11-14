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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/product', 'ProductController@index')->name('product');

Route::post('/product/store','ProductController@store');

Route::get('/add-product', function () {
    return view('add-product');
});

Route::get('/product/edit/{id}', 'ProductController@edit');

Route::get('/address', 'AddressController@index')->name('address');

Route::get('/add-address', function () {
    return view('add-address');
});

Route::post('/address/store','AddressController@store');

Route::get('/address/edit/{id}', 'AddressController@edit');

Route::get('/member', 'MemberController@index')->name('member');

Route::get('/add-member', function () {
    return view('add-member');
});

Route::post('/member/store','MemberController@store');

Route::get('/delivery', 'DeliveryController@index')->name('delivery');