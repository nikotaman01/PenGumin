<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', "TopController@index");

Route::get('/mypage/select', 'SelectController@index');
Route::post('/mypage/select', 'SelectController@store');

Route::get('/mypage', "MyController@show");
Route::get('/invite/index', "InviteController@index");
Route::post('/invite/email', "InviteController@email");
Route::get('/invite/complete', "InviteController@complete");
Route::get('/invite/register', "InviteController@register");
Route::get('/auth/form', "Auth\AuthController@form");
Route::get('/auth/login', "Auth\AuthController@login");




