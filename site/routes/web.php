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
    return view('index')->name('index');
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
//categories
Route::get('categories/create', 'categoriesController@create')->name('category.create');
Route::post('categories/store', 'categoriesController@store')->name('category.store');
Auth::routes();
//auth
Auth::routes();
Route::resource('/auth','authController');
Route::get('/admin/register', 'HomeController@index')->name('home');


//dress-admin
Route::get('admin/index', 'DressesController@index')->name('dress.index');//->middleware('checkUser');
Route::get('admin/createDress', 'DressesController@create')->name('dress.create');//->middleware('checkUser');
Route::get('admin/show/{id}', 'DressesController@show')->name('dress.show')->middleware('checkUser');
Route::get('admin/home', 'DressesController@home')->name('dress.home')->middleware('checkUser');
Route::get('admin/edit/{id}', 'DressesController@edit')->name('dress.edit')->middleware('checkUser');
Route::post('admin/store', 'DressesController@store')->name('dress.store');
Route::post('admin/update/{id}', 'DressesController@update')->name('dress.update');
Route::delete('admin/delete/{id}', 'DressesController@destroy')->name('dress.destroy');
//order
Route::get('/order/{id}', 'orderController@create')->name('order.create');
Route::post('/order/store/', 'orderController@store')->name('order.store');