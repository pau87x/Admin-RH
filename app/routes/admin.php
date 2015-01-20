<?php

Route::get('employee/delete/{id}', ['as' => 'delete_employee', 'uses' => 'EmployeesController@delete']);
Route::delete('employee/deleting/{id}', ['as' => 'destroy_employee', 'uses' => 'EmployeesController@destroy']);

Route::get('users', ['as' => 'users', 'uses' => 'UsersController@show']);

Route::get('center/delete/{id}', ['as' => 'delete_center', 'uses' => 'CentersController@delete']);
Route::delete('center/deleting/{id}', ['as' => 'destroy_center', 'uses' => 'CentersController@destroy']);

Route::get('title/delete/{id}', ['as' => 'delete_title', 'uses' => 'TitlesController@delete']);
Route::delete('title/deleting/{id}', ['as' => 'destroy_title', 'uses' => 'TitlesController@destroy']);