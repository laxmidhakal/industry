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
Route::post('/home/sort/slider', 'Backend\SliderController@isSort');
Route::get('/home/slider/isactive/{id}', 'Backend\SliderController@isactive')->name('isactiveslider');
Route::resource('/home/about', 'Backend\AboutController');
Route::get('/home/about/isactive/{id}', 'Backend\AboutController@isactive')->name('isactiveabout');
Route::post('/home/sort/about', 'Backend\AboutController@isSort');
Route::resource('/home/gallery', 'Backend\GalleryController');
Route::post('/home/sort/gallery', 'Backend\GalleryController@isSort');
Route::get('/home/gallery/isactive/{id}', 'Backend\GalleryController@isactive')->name('isactivegallery');
Route::resource('/home/company', 'Backend\CompanyController');
Route::get('/home/company/{slug}/detail', 'Backend\CompanyContactController@index')->name('companyDetail');
Route::post('/home/company/detail/store', 'Backend\CompanyContactController@store');
Route::get('/home/companydetail/isactive/{id}', 'Backend\CompanyContactController@isactive')->name('isactiveproductDetail');
Route::post('/home/sort/company', 'Backend\CompanyController@isSort');
Route::get('/home/company/isactive/{id}', 'Backend\CompanyController@isactive')->name('isactivecompany');
Route::get('/home/company/detail/{id}/edit', 'Backend\CompanyContactController@edit')->name('companyDetail-edit');
Route::post('/home/company/detail/{id}/update', 'Backend\CompanyContactController@update')->name('companyDetail-update');
Route::get('/home/company/detail/{id}/delete', 'Backend\CompanyContactController@destroy')->name('company-delete');
Route::get('/home/companydetail/isactive/{id}', 'Backend\CompanyContactController@isactive')->name('isactivecompanyDetail');
Route::post('/home/sort/company/detail', 'Backend\CompanyContactController@isSort');


Route::resource('/home/team', 'Backend\TeamController');
Route::post('/home/sort/team', 'Backend\TeamController@isSort');
Route::get('/home/team/isactive/{id}', 'Backend\TeamController@isactive')->name('isactiveteam');
Route::resource('/home/product', 'Backend\ProductController');
Route::post('/home/sort/product', 'Backend\ProductController@isSort');
Route::get('/home/product/isactive/{id}', 'Backend\ProductController@isactive')->name('isactiveproduct');
Route::get('/home/product/{slug}/detail', 'Backend\ProductDetailController@index')->name('productDetail');
Route::post('/home/product/detail/store', 'Backend\ProductDetailController@store');
Route::get('/home/product/detail/{id}/edit', 'Backend\ProductDetailController@edit')->name('productDetail-edit');
Route::post('/home/product/detail/{id}/update', 'Backend\ProductDetailController@update')->name('productDetail-update');
Route::post('/home/sort/product/detail', 'Backend\ProductDetailController@isSort');
Route::get('/home/productdetail/isactive/{id}', 'Backend\ProductDetailController@isactive')->name('isactiveproductDetail');
Route::get('/home/product/detail/{id}/delete', 'Backend\ProductDetailController@destroy')->name('product-delete');

Route::resource('/home/setting', 'Backend\SettingController');
Route::get('/home/setting/isactive/{id}', 'Backend\SettingController@isactive')->name('isactivesetting');
Route::get('/home/contact', 'ContactController@create')->name('homecontact');
Route::get('/home/contact/{id}/delete', 'ContactController@destroy')->name('contact-delete');
Route::resource('/home/social', 'Backend\SocialController');
Route::get('/home/social/isactive/{id}', 'Backend\SocialController@isactive')->name('isactivesocial');













