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
    return view('auth.login');
});
Route::get('my-charts','AdminController@charts')->name('chart');
Route::get('add-user','AdminController@add_user')->name('add_user');
Route::get('view-user','AdminController@view_users')->name('view_users');
Route::get('warn-user','AdminController@warn_users')->name('warn_users');
Route::get('feedback','AdminController@feedback')->name('feedback');
Route::get('feedback','AdminController@suggestion')->name('suggestion');

Route::get('/page-not-found',function (){
   return view('404');
});
Auth::routes();

Route::middleware(['auth'])->group(function (){
    Route::group(['middleware'=>'admin'],function (){
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/home','AdminController@home')->name('admin_home');
        Route::get('/add-user','AdminController@add_user')->name('add_user');

    });

});
//tp db
//Route::post('/','StudentController@submit');

Route::post('store','AdminController@store')->name('store');