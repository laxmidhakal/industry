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
Route::get('/about', 'IndustryController@indexAbout')->name('about');
Route::get('/companies', 'IndustryController@indexCompanies')->name('companies');
Route::get('/gallery', 'IndustryController@indexGallery')->name('gallery');
Route::get('/product', 'IndustryController@indexProduct')->name('product');
Route::get('/team', 'IndustryController@indexTeam')->name('team');
Route::get('/contact', 'IndustryController@indexContact')->name('contact');

Auth::routes();

Route::get('/home', 'Backend\HomeController@index')->name('home');

Route::resource('/slider', 'Backend\SliderController');
Route::resource('/about', 'Backend\AboutController');
Route::resource('/gallery', 'Backend\GalleryController');
Route::resource('/companies', 'Backend\CompanyController');





