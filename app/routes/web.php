<?php
use App\Router;

Router::get('/','App\Controllers\HomeController@index');
Router::get('/home','App\Controllers\HomeController@index');
Router::get('/admin','App\Controllers\AdminController@index');

Router::get('/product','App\Controllers\ProductController@product');
Router::get('/productType','App\Controllers\ProductController@productType');
Router::get('/productDetail','App\Controllers\ProductController@productDetail');
Router::get('/login','App\Controllers\Auth\LoginController@showLoginForm');
Router::get('/logout','App\Controllers\Auth\LoginController@logout');
Router::get('/register','App\Controllers\Auth\RegisterController@showRegisterForm');
Router::get('/addcart','App\Controllers\CartController@addCart');
Router::get('/cart','App\Controllers\CartController@showCart');
Router::get('/deleteCart','App\Controllers\CartController@deleteCart');
Router::get('/verify','App\Controllers\Auth\VerifyController@showVerifyForm');

Router::post('/search','App\Controllers\ProductController@search');
Router::post('/register','App\Controllers\Auth\RegisterController@register');
Router::post('/verify','App\Controllers\Auth\VerifyController@verify');
Router::post('/login','App\Controllers\Auth\LoginController@login');
Router::post('/addCart','App\Controllers\CartController@addCart');
Router::post('/pay','App\Controllers\CartController@pay');
Router::get('/vnpay_return','App\Controllers\CartController@success');

Router::get('/adminProduct','App\Controllers\AdminController@index');
Router::get('/adminBill','App\Controllers\AdminController@Bill');
Router::get('/adminUser','App\Controllers\AdminController@User');
Router::get('/acceptBill','App\Controllers\AdminController@acceptBill');
Router::get('/cancleBill','App\Controllers\AdminController@cancleBill');
Router::get('/detailBill','App\Controllers\AdminController@detailBill');
Router::get('/deleteProduct','App\Controllers\AdminController@deleteProduct');

Router::post('/addProduct','App\Controllers\AdminController@addProduct');
Router::get('/editProduct','App\Controllers\AdminController@editProduct');
Router::post('/editProduct','App\Controllers\AdminController@editProduct');