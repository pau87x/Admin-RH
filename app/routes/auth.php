<?php

Route::get('account', ['as' => 'account', 'uses' => 'UsersController@account']);
Route::put('account', ['as' => 'update_account', 'uses' => 'UsersController@updateAccount']);
Route::get('profile', ['as' => 'profile', 'uses' => 'UsersController@profile']);
Route::put('profile', ['as' => 'update_profile', 'uses' => 'UsersController@updateProfile']);

Route::get('employees', ['as' => 'employees', 'uses' => 'EmployeesController@show']);

Route::get('employee/register', ['as' => 'new_employee', 'uses' => 'EmployeesController@create']);
Route::post('employee/register', ['as' => 'save_new_employee', 'uses' => 'EmployeesController@register']);

Route::get('employee/update/{id}', ['as' => 'update_employee', 'uses' => 'EmployeesController@update']);
Route::put('employee/update/{id}', ['as' => 'save_update_employee', 'uses' => 'EmployeesController@saveUpdate']);

Route::get('employee/status/{id}', ['as' => 'update_status', 'uses' => 'EmployeesController@updateStatus']);
Route::put('employee/stautus/{id}', ['as' => 'save_status', 'uses' => 'EmployeesController@saveStatus']);

Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
