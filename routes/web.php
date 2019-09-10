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


/* User Routes */

Route::get('/', 'UserController@index');

Route::get('/user/signup','UserController@signup');

Route::get('/user/showproducts','UserController@showproducts');

Route::get('/user/showcart','UserController@showcart');

Route::post('/user/checkuser','UserController@checkuser');

Route::post('/user/insertuser','UserController@insertuser');



/*  Admin Routes   */

Route::get('/admin','AdminController@login');

Route::get('/admin/logout','AdminController@logout');

Route::post('/admin/checkuser','AdminController@checkuser');

Route::get('/admin/addcategory','AdminController@addcategory');

Route::post('/admin/insertcategory','AdminController@insertcategory');

Route::get('/admin/showcategory','AdminController@showcategory');

Route::get('/admin/addproduct','AdminController@addproduct');

Route::post('/admin/insertproduct','AdminController@insertproduct');

Route::get('/admin/showproduct','AdminController@showproduct');
