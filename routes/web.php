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

/*=======Start Studying================*/
/*Route::get('/', function () {
    $data = [];
    $data['name'] = 'Shari';
    $data['id'] = 5005;
    return view('welcome',$data);
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/landing', function () {
    return view('landing');
});
Route::get('/about', function () {
    return view('about');
});
Route::post('/store', 'UserController@store');

Route::get('index','Front\UserController@getIndex');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/
/*=======End Studying================*/

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home') -> middleware('verified');
Route::get('/', 'HomeController@index')->name('home');