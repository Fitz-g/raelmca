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

    Route::get('/members', 'MemberController@index')->name('members.index');
    Route::get('/members/create', 'MemberController@create')->name('members.create');
    Route::get('/members/{member}/edit', 'MemberController@edit')->name('members.edit');
    Route::get('/members/{member}/show', 'MemberController@show')->name('members.show');
    Route::post('/members/store', 'MemberController@store')->name('members.store');
    Route::patch('/members/{member}/update', 'MemberController@update')->name('members.update');
    Route::delete('/members/{member}/delete', 'MemberController@destroy')->name('members.destroy');
});
