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


Route::get('/redirect/{service}', 'SocialController@redirect');
Route::get('/callback/{service}', 'SocialController@callback');

Route::group(['prefix'=>LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],function(){
    Route::group(['prefix' => 'offers'],function(){
            Route::get('create', 'OfferController@create')->name('offers.create');
            Route::post('store', 'OfferController@store')->name('offers.store');
            Route::get('edit/{offer_id}', 'OfferController@editOffer')->name('offers.edit');
            Route::get('delete/{offer_id}', 'OfferController@deleteOffer')->name('offers.delete');
            Route::post('update/{offer_id}', 'OfferController@updateOffer')->name('offers.update');

            Route::get('show', 'OfferController@getOffers')->name('offers.show');
            Route::get('videos','MediaController@getViewers');
    });
    Route::group(['prefix'=>'ajax-offer'],function (){
        Route::get('create','AjaxOfferController@create')->name('ajax-offer.create');
        Route::post('store','AjaxOfferController@store')->name('ajax-offer.store');
    });
});


