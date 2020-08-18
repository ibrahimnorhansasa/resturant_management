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




//admin control
//Route::GET('/home', 'AdminController@index')->name('admin.home');

//Route::group(['prefix'=>'admin','middleware'=>'auth:admin'],function(){
Route::group(['prefix'=>'admin'],function(){
//Route::get('/home', 'HomeController@index');
Route::resource('/menus', 'MenusController');
Route::resource('/items', 'ItemsController');
Route::resource('/meals', 'MealsController');
Route::resource('/customers','CustomerController')->except(['store','show','edit','update']);
});
Route::get('/adminpanel','DashboardController@index');


//Route::get('/show', function () {
//    return view('website.show');
//});

Auth::routes();
// website route
Route::get('/', function () {
    return view('website');
});

Route::post('/customer/contactUs','WebsiteController@sendMail');
Route::get('/order','OrdersController@create')->middleware('auth');
Route::post('/order','OrdersController@store')->name('orders.store')->middleware('auth');
Route::get('/myorder','OrdersController@showmyorder')->middleware('auth');
Route::get('/','WebsiteController@showAll');
Route::get('/showMenu/{id}','MenusController@show');
Route::get('/showItem/{id}','ItemsController@show');
Route::get('/showOrder/{user}','OrdersController@index');

Route::get('/contact','WebsiteController@contact');

