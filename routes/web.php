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

// Route::get('home', function () {
//     return view('HomePage.Home');
// });

// Route::get('login', function () {
//     return view('Login');
// });

Route::get('login', 'UserController@getlogin')->name('getlogin');
Route::post('login', 'UserController@postlogin')->name('postlogin');

Route::get('home', 'HomeController@gethome')->name('gethome');

