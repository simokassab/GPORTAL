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
    return view('index');
});

Route::get('portal/getCat/{id}', 'PortalController@getSvByCatID');

Route::get('logs/{id}/{clicked}', 'LogsController@store');
Route::get('/reports/s',['uses' => 'logsController@show']);

Route::get('/serviceprovider', 'PagesController@serviceprovider');
Route::get('/services', 'PagesController@services');
Route::get('/categories', 'PagesController@categories');
Route::get('/reports', 'PagesController@reports');

Route::resource('/serviceprovider', 'ServiceprovController');
Route::resource('/services', 'ServicesController');
Route::resource('/categories', 'CategoriesController');
Route::resource('/portal', 'PortalController');
Route::resource('/reports', 'LogsController');
Route::resource('/Category', 'CategoryController');