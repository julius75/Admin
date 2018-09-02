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

Route::get('/page-not-found',function (){
   return view('404');
});

Auth::routes();
Route::middleware(['auth'])->group(function (){
    Route::group(['middleware'=>'admin_middleware'],function (){


        Route::get('/home','AdminController@home')->name('admin_home');
        Route::get('/add-user','AdminController@add_user')->name('add_user');
        Route::get('/delete/user/{id}','AdminController@delete_user');
        Route::get('/edit/user/{id}','AdminController@edit_user');
        Route::post('/update/user/{id}','AdminController@update_user');

        //import users from excel
        Route::get('/import-user','AdminController@import_user')->name('import_user');
        Route::post('/user','AdminController@handle_import')->name('import-excel');



        Route::get('my-charts','AdminController@charts')->name('chart');
//Route::get('add-user','AdminController@add_user')->name('add_user');
        Route::get('view-user','AdminController@view_users')->name('view_users');
        Route::get('warn-user','AdminController@warn_users')->name('warn_users');
        Route::get('feedback','AdminController@feedback')->name('feedback');
        Route::get('suggestion','AdminController@suggestion')->name('suggestion');
        Route::post('/send-reply/{id}','AdminController@send_reply');
        Route::get('print-suggestion','AdminController@print_suggestion')->name('print_suggestion');
        Route::get('/view/responses','AdminController@view_feedbacks')->name('view_feedbacks');
        Route::post('store','AdminController@store')->name('store');

    });
});
Route::middleware(['auth'])->group(function (){
   // Route::group(['middleware'=>'admin'],function (){







    // });

});
//tp db
//Route::post('/','StudentController@submit');


