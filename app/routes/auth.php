<?php

Route::get('sign-up', ['as' => 'sign_up', 'uses' => 'UsersController@signUp']);
Route::post('sign-up', ['as' => 'register', 'uses' => 'UsersController@register']);

Route::get('account', ['as' => 'account', 'uses' => 'UsersController@account']);
Route::put('account', ['as' => 'update_account', 'uses' => 'UsersController@updateAccount']);

Route::get('user/update/{id}', ['as' => 'edit_user', 'uses' => 'UsersController@edit']);
Route::put('user/update/{id}', ['as' => 'update_user', 'uses' => 'UsersController@update']);






Route::get('employees', ['as' => 'employees', 'uses' => 'EmployeesController@show']);

Route::get('employee/register', ['as' => 'new_employee', 'uses' => 'EmployeesController@create']);
Route::post('employee/register', ['as' => 'save_new_employee', 'uses' => 'EmployeesController@register']);

Route::get('employee/{id}', ['as' => 'show_employee', 'uses' => 'EmployeesController@showEmployee']);

Route::get('employee/update/{id}', ['as' => 'edit_employee', 'uses' => 'EmployeesController@edit']);
Route::put('employee/update/{id}', ['as' => 'update_employee', 'uses' => 'EmployeesController@update']);

//delete_employee -> admin.php

Route::get('employee/changes/{id}', ['as' => 'changes', 'uses' => 'ChangesController@show']);

Route::get('employee/change/register/{id}', ['as' => 'new_change', 'uses' => 'ChangesController@create']);
Route::post('employee/change/register/{id}', ['as' => 'save_new_change', 'uses' => 'ChangesController@register']);

Route::get('employee/change/edit/{id}', ['as' => 'edit_change', 'uses' => 'ChangesController@edit']);
Route::put('employee/change/update/{id}', ['as' => 'update_change', 'uses' => 'ChangesController@update']);

Route::get('employee/change/delete/{id}', ['as' => 'delete_change', 'uses' => 'ChangesController@delete']);
Route::delete('employee/change/destroy/{id}', ['as' => 'destroy_change', 'uses' => 'ChangesController@destroy']);



Route::get('centers', ['as' => 'centers', 'uses' => 'CentersController@show']);

Route::get('centers/register', ['as' => 'new_center', 'uses' => 'CentersController@create']);
Route::post('centers/register', ['as' => 'save_new_center', 'uses' => 'CentersController@register']);

Route::get('centers/update/{id}', ['as' => 'edit_center', 'uses' => 'CentersController@edit']);
Route::put('centers/update/{id}', ['as' => 'update_center', 'uses' => 'CentersController@update']);



Route::get('titles', ['as' => 'titles', 'uses' => 'TitlesController@show']);
Route::get('titles/register', ['as' => 'new_title', 'uses' => 'TitlesController@create']);
Route::post('titles/register', ['as' => 'save_new_title', 'uses' => 'TitlesController@register']);

Route::get('titles/update/{id}', ['as' => 'edit_title', 'uses' => 'TitlesController@edit']);
Route::put('titles/update/{id}', ['as' => 'update_title', 'uses' => 'TitlesController@update']);




Route::get('laysoff/register/{id}', ['as' => 'layoff', 'uses' => 'LayoffsController@create']);
Route::post('laysoff/register/{id}', ['as' => 'save_new_layoff', 'uses' => 'LayoffsController@register']);

Route::get('laysoff/delete/{id}', ['as' => 'delete_layoff', 'uses' => 'LayoffsController@delete']);
Route::delete('laysoff/destroy/{id}', ['as' => 'destroy_layoff', 'uses' => 'LayoffsController@destroy']);



Route::get('report/', ['as' => 'report', 'uses' => 'EmployeesController@filterReport']);
Route::get('filter-report/', ['as' => 'report_search', 'uses' => 'EmployeesController@filterReportSearch']);



Route::get('list/', ['as' => 'list', 'uses' => 'AttendancesController@listAttendance']);
Route::get('attendance/{id}', ['as' => 'attendance', 'uses' => 'AttendancesController@register']);
Route::get('attendance/delete/{id}/{employee_id}', ['as' => 'delete_attendance', 'uses' => 'AttendancesController@delete']);

Route::get('attendances/', ['as' => 'report_list', 'uses' => 'AttendancesController@listReport']);
Route::get('filter-report/list', ['as' => 'report_list_search', 'uses' => 'AttendancesController@listReportSearch']);



Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);