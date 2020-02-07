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

Route::get('/', function () {
    return view('welcome');
})->name('index');
Route::get('/about', 'IndustryController@about')->name('about');
Route::get('/companies', 'IndustryController@companies')->name('companies');
Route::get('/gallery', 'IndustryController@gallery')->name('gallery');
Route::get('/product', 'IndustryController@product')->name('product');
Route::get('/team', 'IndustryController@team')->name('team');
Route::get('/contact', 'IndustryController@contact')->name('contact');

Auth::routes();

Route::get('/home', 'Backend\HomeController@index')->name('home');
Route::get('/home/dashboard', 'Backend\HomeController@dash')->name('dash');
