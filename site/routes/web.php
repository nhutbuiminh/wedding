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

Route::get('/', function () {
    return view('index');
})->name('home');
Route::get('/left', function(){
    return view('dresses');
})->name('leftSlidebar');
Route::get('/right', function(){
    return view('photography');
})->name('rightSlidebar');
Route::get('/no', function(){
    return view('weddingServices');
})->name('noSlidebar');
//categories
Route::get('categories/create', 'categoriesController@create')->name('category.create');
Route::post('categories/store', 'categoriesController@store')->name('category.store');
Auth::routes();
//auth
 
Route::resource('auth','authController');
// Route::get('/admin/register', 'HomeController@index')->name('home');


Route::get('auth/admin', 'authController@login')->name('auth.login');
// Route::post('authentication', 'authController@authLogin')->name('auth');
Route::get('/auth/create', 'authController@create')->name('auth.create');
Route::post('/auth/store', 'authController@store')->name('auth.store');
Route::get('/auth/logout',  'authController@logout' )->name('auth.logout');
 Route::get('/auth', 'authController@index')->name('auth.index');
Route::get('auth/show/{id}', 'authController@show')->name('auth.show');
Route::get('auth/edit/{id}', 'authController@edit')->name('auth.edit');
Route::post('auth/update/{id}', 'authController@update')->name('auth.update');
Route::delete('auth/delete/{id}', 'authController@destroy')->name('auth.destroy'); 

 

//album-admin
Route::get('admin/album/index', 'PhotographyServicesController@index')->name('album.index');//->middleware('checkUser');
Route::get('admin/album/createAlbum', 'PhotographyServicesController@create')->name('album.create');//->middleware('checkUser');
Route::get('admin/album/show/{id}', 'PhotographyServicesController@show')->name('album.show')->middleware('checkUser');
Route::get('admin/album/home', 'PhotographyServicesController@home')->name('album.home')->middleware('checkUser');
Route::get('admin/album/edit/{id}', 'PhotographyServicesController@edit')->name('album.edit')->middleware('checkUser');
Route::post('admin/album/store', 'PhotographyServicesController@store')->name('album.store');
Route::post('admin/album/update/{id}', 'PhotographyServicesController@update')->name('album.update');
Route::delete('admin/album/delete/{id}', 'PhotographyServicesController@destroy')->name('album.destroy');


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
//Route::get('/order/{id}', 'orderController@create')->name('order.create');
Route::post('/order/store/', 'orderController@store')->name('order.store');

