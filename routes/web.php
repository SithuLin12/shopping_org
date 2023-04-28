<?php

use Illuminate\Support\Facades\Route;

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
});


// admin login
Route::get('/admin/login','Admin\PageController@showLogin');
Route::post('/admin/login','Admin\PageController@login');


// admin route
Route::group(['prefix' => 'admin','namespace' => 'Admin'],function(){
    // admin login and logout
    Route::get('/','PageController@showDashboard');
    Route::post('/logout','PageController@logout');


    // category
    Route::resource('/category','CategoryController');

    // color
    Route::resource('/color', 'ColorController');
});
