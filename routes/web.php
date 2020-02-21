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

Route::get('/', 'IndustryController@index')->name('index');

Route::get('/about', 'IndustryController@indexAbout')->name('about');
Route::get('/companies', 'IndustryController@indexCompanies')->name('companies');
Route::get('/companies/{slug}', 'IndustryController@indexCompaniesDetail')->name('companiesdetail');
Route::get('/gallery', 'IndustryController@indexGallery')->name('gallery');
Route::get('/product/{slug}', 'IndustryController@indexProduct')->name('product');
Route::get('/product/{product}/{slug}', 'IndustryController@indexProductDetail')->name('productDescription');
Route::get('/team', 'IndustryController@indexTeam')->name('team');
Route::get('/contact', 'ContactController@index')->name('contact');
Route::post('/contact/store', 'ContactController@store')->name('store');


Auth::routes();

Route::get('/home', 'Backend\HomeController@index')->name('home');

Route::resource('/home/slider', 'Backend\SliderController');
Route::resource('/home/about', 'Backend\AboutController');
Route::get('/isactive/{id}', 'Backend\AboutController@isactive')->name('isactive');
Route::resource('/home/gallery', 'Backend\GalleryController');
Route::resource('/home/company', 'Backend\CompanyController');
Route::resource('/home/team', 'Backend\TeamController');
Route::resource('/home/product', 'Backend\ProductController');
Route::get('/home/product/{slug}/detail', 'Backend\ProductDetailController@index')->name('productDetail');
Route::post('/home/product/detail/store', 'Backend\ProductDetailController@store');
Route::resource('/home/setting', 'Backend\SettingController');
Route::get('/home/contact', 'ContactController@create');
Route::resource('/home/social', 'Backend\SocialController');











