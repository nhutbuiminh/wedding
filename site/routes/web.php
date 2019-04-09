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
})->name('home');
Route::get('/left', function(){
    return view('left-sidebar');
})->name('leftSlidebar');
Route::get('/right', function(){
    return view('right-sidebar');
})->name('rightSlidebar');
Route::get('/no', function(){
    return view('no-sidebar');
})->name('noSlidebar');
//category
Route::get('/admin/index', 'CategoryServicesController@index' )->name('category.index');
Route::get('/admin/create', 'CategoryServicesController@create' )->name('category.create');
//auth