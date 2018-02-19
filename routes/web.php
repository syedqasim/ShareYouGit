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
// Route::get('/hello', function () {
//     return '<h1>Hello World</h1>';
    
// });

// Route::get('/about', function () {
//     return view('pages.about');
    
// });
// Route::get('/user/{id}/{name}',function($id,$name){
//     return 'This is user '.$name.' with an id '.$id;
// });


//  Route::get('/','PagesController@index' );
//  Route::get('/about','PagesController@about' );
//  Route::get('/services','PagesController@services' );
//  Route::get('/ads/approvals', 'AdsController@approvals');
//  Route::get('/ads/search', 'AdsController@search');
//  Route::get('/ads/approve/{id}', 'AdsController@approve');
//  Route::get('/ads/reject/{id}', 'AdsController@reject');
//  Route::get('/ads/myads', 'AdsController@myads');
// Route::resource('posts','PostsController');
  Route::resource('/api/ads','AdsController');
  //Route::post('/api/users/login', 'UserController@login');
  
 Route::post('/api/users/add', 'UserController@add');

  //Route::post('auth/login', 'LoginController@login');
//  Route::post('/login/refresh', 'LoginController@refresh');
//  Route::post('/logout', 'LoginController@logout');
 
// //Route::get('/ads/approvals', 'AdsController@approvals');
// Route::get('/community', 'CommunityController@index');
 Route::get('/dashboard', 'DashboardController@index');
 Route::get('/dashboard/test', 'DashboardController@test');
// Route::get('/dashboard/approvals', 'DashboardController@approvals');
// Route::get('/dashboard/test', 'DashboardController@test');
Route::get('auth/github', 'Auth\AuthController@redirectToProvider');
Route::get('auth/github/callback', 'Auth\AuthController@handleProviderCallback');
Route::get('auth/google', 'Auth\AuthController@redirectToGoogleProvider');
Route::get('auth/google/callback', 'Auth\AuthController@handleProviderGoogleCallback');
Auth::routes();