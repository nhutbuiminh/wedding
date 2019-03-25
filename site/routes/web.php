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
Route::get('/left', function(){
    return view('left-sidebar');
});
Route::get('/right', function(){
    return view('right-sidebar');
});
Route::get('/no', function(){
    return view('no-sidebar');
});