<?php

Route::get('employee/delete/{id}', ['as' => 'delete_employee', 'uses' => 'EmployeesController@delete']);
Route::delete('employee/deleting/{id}', ['as' => 'destroy_employee', 'uses' => 'EmployeesController@destroy']);