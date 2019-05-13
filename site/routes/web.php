<?php
use App\Http\Middleware\CheckUser;
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
//dress & album
Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/left', function(){
    return view('dress.index');
})->name('leftSlidebar');
Route::get('/right', function(){
    return view('photography.index');
})->name('rightSlidebar');
Route::get('/no', function(){
    return view('weddingServices');
})->name('noSlidebar');
Route::get('/detailDress', function(){
    return view('dress.detail');
})->name('detaillDress');
Route::get('/detailAlbum', function(){
    return view('photography.detail');
})->name('detailAlbum');

//categories
Route::get('categories/create', 'CategoryServicesController@create')->name('category.create');
Route::post('categories/store', 'CategoryServicesController@store')->name('category.store');
Auth::routes();
//auth
 Auth::routes();
 Route::get('/home', 'UserController@index')->name('home');
Route::resource('users','authController');
// Route::get('/admin/register', 'HomeController@index')->name('home');


// Route::get('auth/admin', 'authController@login')->name('auth.login');
// // Route::post('authentication', 'authController@authLogin')->name('auth');
// Route::get('/auth/create', 'authController@create')->name('auth.create');
// Route::post('/auth/store', 'authController@store')->name('auth.store');
// Route::get('/auth/logout',  'authController@logout' )->name('auth.logout');
Route::get('/auth', 'authController@index')->name('auth.index');
Route::get('auth/show/{id}', 'authController@show')->name('auth.show');
Route::get('auth/edit/{id}', 'authController@edit')->name('auth.edit');
Route::post('auth/update/{id}', 'authController@update')->name('auth.update');
Route::delete('auth/delete/{id}', 'authController@destroy')->name('auth.destroy'); 

 

//album-admin
Route::get('admin/album/index', 'PhotographyServicesController@index')->name('album.index')->middleware('auth');
Route::get('admin/album/createAlbum', 'PhotographyServicesController@create')->name('album.create')->middleware('auth');
Route::get('admin/album/show/{id}', 'PhotographyServicesController@show')->name('album.show')->middleware('auth');
Route::get('admin/album/home', 'PhotographyServicesController@home')->name('album.home')->middleware('auth');
Route::get('admin/album/edit/{id}', 'PhotographyServicesController@edit')->name('album.edit')->middleware('auth');
Route::post('admin/album/store', 'PhotographyServicesController@store')->name('album.store')->middleware('auth');
Route::post('admin/album/update/{id}', 'PhotographyServicesController@update')->name('album.update')->middleware('auth');
Route::delete('admin/album/delete/{id}', 'PhotographyServicesController@destroy')->name('album.destroy')->middleware('auth');


//dress-admin
Route::get('admin/index', 'DressesController@index')->name('dress.index')->middleware('auth');//;
Route::get('admin/createDress', 'DressesController@create')->name('dress.create')->middleware('auth');//;
Route::get('admin/show/{id}', 'DressesController@show')->name('dress.show')->middleware('auth');
Route::get('admin/home', 'DressesController@home')->name('dress.home')->middleware('auth');
Route::get('admin/edit/{id}', 'DressesController@edit')->name('dress.edit')->middleware('auth');
Route::post('admin/store', 'DressesController@store')->name('dress.store')->middleware('auth');
Route::post('admin/update/{id}', 'DressesController@update')->name('dress.update')->middleware('auth');
Route::delete('admin/delete/{id}', 'DressesController@destroy')->name('dress.destroy')->middleware('auth');
//order
//Route::get('/order/{id}', 'orderController@create')->name('order.create');
Route::post('/order/store/', 'orderController@store')->name('order.store');

