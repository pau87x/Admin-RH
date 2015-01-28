<?php

Route::get('sign-up', ['as' => 'sign_up', 'uses' => 'UsersController@signUp']);
Route::post('sign-up', ['as' => 'register', 'uses' => 'UsersController@register']);

Route::get('users', ['as' => 'users', 'uses' => 'UsersController@show']);
Route::get('search-user', ['as' => 'search_users', 'uses' => 'UsersController@searchUsers']);


Route::get('user/update/{id}', ['as' => 'edit_user', 'uses' => 'UsersController@edit']);
Route::put('user/update/{id}', ['as' => 'update_user', 'uses' => 'UsersController@update']);

Route::get('employee/delete/{id}', ['as' => 'delete_employee', 'uses' => 'EmployeesController@delete']);
Route::delete('employee/deleting/{id}', ['as' => 'destroy_employee', 'uses' => 'EmployeesController@destroy']);

Route::get('center/delete/{id}', ['as' => 'delete_center', 'uses' => 'CentersController@delete']);
Route::delete('center/deleting/{id}', ['as' => 'destroy_center', 'uses' => 'CentersController@destroy']);

Route::get('title/delete/{id}', ['as' => 'delete_title', 'uses' => 'TitlesController@delete']);
Route::delete('title/deleting/{id}', ['as' => 'destroy_title', 'uses' => 'TitlesController@destroy']);

Route::get('position/delete/{id}', ['as' => 'delete_position', 'uses' => 'PositionsController@delete']);
Route::delete('position/deleting/{id}', ['as' => 'destroy_position', 'uses' => 'PositionsController@destroy']);