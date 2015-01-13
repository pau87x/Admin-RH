<?php

Route::get('account', ['as' => 'account', 'uses' => 'UsersController@account']);
Route::put('account', ['as' => 'update_account', 'uses' => 'UsersController@updateAccount']);
Route::get('profile', ['as' => 'profile', 'uses' => 'UsersController@profile']);
Route::put('profile', ['as' => 'update_profile', 'uses' => 'UsersController@updateProfile']);

Route::get('employees', ['as' => 'employees', 'uses' => 'EmployeesController@show']);

Route::get('employee/register', ['as' => 'new_employee', 'uses' => 'EmployeesController@create']);
Route::post('employee/register', ['as' => 'save_new_employee', 'uses' => 'EmployeesController@register']);

Route::get('employee/{id}', ['as' => 'show_employee', 'uses' => 'EmployeesController@showEmployee']);

Route::get('employee/update/{id}', ['as' => 'update_employee', 'uses' => 'EmployeesController@update']);
Route::put('employee/update/{id}', ['as' => 'save_update_employee', 'uses' => 'EmployeesController@saveUpdate']);


Route::get('report/', ['as' => 'report', 'uses' => 'EmployeesController@filterReport']);
Route::get('filter-report/', ['as' => 'report_search', 'uses' => 'EmployeesController@filterReportSearch']);

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

Route::get('titles', ['as' => 'titles', 'uses' => 'TitlesController@show']);
Route::get('titles/register', ['as' => 'new_title', 'uses' => 'TitlesController@create']);
Route::post('titles/register', ['as' => 'save_new_title', 'uses' => 'TitlesController@register']);

Route::get('titles/update/{id}', ['as' => 'update_title', 'uses' => 'TitlesController@update']);
Route::put('titles/update/{id}', ['as' => 'save_update_title', 'uses' => 'TitlesController@saveUpdate']);


Route::get('laysoff/register/{id}', ['as' => 'layoff', 'uses' => 'LayoffsController@create']);
Route::post('laysoff/register/{id}', ['as' => 'save_new_layoff', 'uses' => 'LayoffsController@register']);

Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
