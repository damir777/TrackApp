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

Route::get('', ['as' => 'GetHomepage', 'uses' => 'PageController@getHomepage']);

Route::get('users', ['as' => 'GetUsers', 'uses' => 'StatisticController@getUsers']);

Route::get('visits/{user}', ['as' => 'GetVisits', 'uses' => 'StatisticController@getVisits']);

Route::get('saveVisitEndTime', ['uses' => 'PageController@saveVisitEndTime']);
