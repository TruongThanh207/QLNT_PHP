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

Route::get('/', 'UserController@getlogin')->name('getlogin');

// Route::get('home', function () {
//     return view('HomePage.Home');
// });

// Route::get('login', function () {
//     return view('Login');
// });

Route::get('login', 'UserController@getlogin')->name('getlogin');
Route::post('login', 'UserController@postlogin')->name('postlogin');
Route::get('logout', 'UserController@logout')->name('logout');


Route::get('home', 'HomeController@gethome')->name('gethome')->middleware('login');
Route::get('x-home', 'HomeController@xoaroom')->name('xoaroom')->middleware('login');
Route::post('register','HomeController@inforregister')->name('inforregister')->middleware('login');
Route::post('home','HomeController@postroom')->name('postroom')->middleware('login');

Route::get('detail/{id}', 'HomeController@detailroom')->name('detailroom')->middleware('login');
Route::get('xoaperson', 'HomeController@xoaperson')->name('xoaperson')->middleware('login');
Route::post('detail/{id}', 'HomeController@fixfeedback')->name('fixed')->middleware('login');
Route::get('traphong','HomeController@gettraphong')->name('gettraphong')->middleware('login');
Route::post('ghino/{id}','HomeController@ghino')->name('ghino');
Route::get('xoano','HomeController@xoano')->name('xoano');

Route::get('employee', 'UserController@getemployee')->name('getemployee')->middleware('admin');

Route::post('addemployee', 'UserController@postaddemployee')->name('postaddemployee')->middleware('admin');
Route::get('addemployee', 'UserController@getaddemployee')->name('getaddemployee')->middleware('admin');

Route::get('detailemployee/{id}', 'UserController@getdetailemployee')->name('getdetailemployee')->middleware('admin');
Route::post('detailemployee/{id}', 'UserController@posteditemployee')->name('posteditemployee')->middleware('admin');
Route::get('xoaemployee/{id}', 'UserController@xoaemployee')->name('xoaemployee');


Route::get('editprofile/{id}', 'UserController@geteditprofile')->name('geteditprofile')->middleware('login');
Route::post('editprofile/{id}', 'UserController@posteditprofile')->name('posteditprofile')->middleware('login');

Route::get('bill', 'BillController@getbill')->name('getbill')->middleware('login');
Route::post('xoa-bill', 'BillController@xoabill')->name('xoabill')->middleware('login');


Route::post('personal/{id}', 'PersonalController@postaddpersonal')->name('postaddpersonal')->middleware('login');

Route::get('service', 'ServiceController@getservice')->name('getservice')->middleware('login');
Route::post('service', 'ServiceController@postservice')->name('postservice')->middleware('login');
Route::get('x-service', 'ServiceController@xoaservice')->name('xoaservice')->middleware('login');

Route::get('khachthue/{cmnd}', 'PersonalController@getkhachthue')->name('khachthue')->middleware('cmnd');
Route::get('bill-khachthue', 'BillController@getbillbymonth')->name('getbillbymonth')->middleware('cmnd');
Route::post('khachthue/{cmnd}', 'BillController@postphanhoi')->name('khachthue')->middleware('cmnd');
//Route::post('phanhoi', 'BillController@postphanhoi')->name('postphanhoi');

Route::post('pdf', 'BillController@pdf')->name('pdf')->middleware('login');



