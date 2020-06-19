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


Route::get('/', 'DashboardController@loginView')->name('login');
Route::post('/login', 'AuthController@login')->name('user-login');
Route::get('/logout', 'AuthController@logout')->name('user-logout');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', 'DashboardController@dashboard')->name('home');

    Route::resource('pays', 'PaysController');
    Route::resource('structures', 'StructureController');

    Route::get('/adherents', 'AdherantController@index')->name('adherents.index');
    Route::get('/adherents/create', 'AdherantController@create')->name('adherents.create');
    Route::post('/adherents/store', 'AdherantController@store')->name('adherents.store');
});
