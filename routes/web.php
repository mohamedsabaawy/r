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
Route::get('php', function () {
    return view('php');
});
Route::group(['namespace'=>'BackEndControllers','middleware'=>'auth'],function (){
    Route::resource('audio','AudioController');
    Route::resource('video','VideoController');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
