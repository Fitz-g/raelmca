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
//Auth::routes(['register' => false]);

Route::get('/', 'DashboardController@loginView')->name('login');
Route::post('/login', 'AuthController@login')->name('user-login');
Route::get('/logout', 'AuthController@logout')->name('user-logout');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', 'HomeController@index')->name('home');
    Route::resource('pays', 'PaysController');
});
