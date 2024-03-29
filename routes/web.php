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
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/role-register','Admin\DashboardController@registered');
    Route::get('/role-edit/{id}','Admin\DashboardController@registeredit');
    Route::put('/role-register-update{id}', 'Admin\DashboardController@registerupdate');
    Route::delete('role-delete/{id}','Admin\DashboardController@registerdelete');

    Route::get('/Sporting-Events','Admin\SportingEventsController@index');
    Route::post('/save-SportingEvents','Admin\SportingEventsController@store');
    Route::get('/sporting-events/{id}','Admin\SportingEventsController@edit');
    Route::put('/sportingevents-update/{id}','Admin\SportingEventsController@update');
    Route::delete('sporting-events-delete/{id}','Admin\SportingEventsController@delete');
    
});

