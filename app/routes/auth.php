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


Route::get('employee/changes/{id}', ['as' => 'changes', 'uses' => 'ChangesController@show']);

Route::get('employee/change/register/{id}', ['as' => 'new_change', 'uses' => 'ChangesController@create']);
Route::post('employee/change/register/{id}', ['as' => 'save_new_change', 'uses' => 'ChangesController@register']);

Route::get('employee/change/update/{id}/{id_change}', ['as' => 'update_change', 'uses' => 'ChangesController@update']);
Route::put('employee/change/update/{id}/{id_change}', ['as' => 'save_update_change', 'uses' => 'ChangesController@saveUpdate']);


Route::get('centers', ['as' => 'centers', 'uses' => 'CentersController@show']);
Route::get('centers/register', ['as' => 'new_center', 'uses' => 'CentersController@create']);
Route::post('centers/register', ['as' => 'save_new_center', 'uses' => 'CentersController@register']);

Route::get('centers/update/{id}', ['as' => 'update_center', 'uses' => 'CentersController@update']);
Route::put('centers/update/{id}', ['as' => 'save_update_center', 'uses' => 'CentersController@saveUpdate']);


// Route::get('employee/status/{id}', ['as' => 'update_status', 'uses' => 'EmployeesController@updateStatus']);
// Route::put('employee/status/{id}', ['as' => 'save_status', 'uses' => 'EmployeesController@saveStatus']);

Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
