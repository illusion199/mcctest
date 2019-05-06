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

//Route::get('/user', 'userManagement@index');
Route::resource('/user', 'userManagement');
Route::get('/user-import', 'userManagement@create');
Route::get('/getuserinfo', 'userManagement@getuserinfoFunc');
Route::get('/getuserDetail/{id}', 'userManagement@getuserDetailFunc');
//Route::get('/user-import', 'userManagement@userImportFunc');
//Route::post('/user-bulk-import', 'userManagement@userBuklImportFunc')->name('bulk-import');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{vue_capture?}', function () {
    return view('frontpage');
})->where('vue_capture', '[\/\w\.-]*');
