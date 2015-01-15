<?php

Route::get('admin/candidate/{id}', ['as' => 'admin_candidate_edit', function ($id) {

    return 'Editando el candidato ' . $id;

}]);

Route::get('employee/delete/{id}', ['as' => 'delete_employee', 'uses' => 'EmployeesController@delete']);
Route::delete('employee/deleting/{id}', ['as' => 'destroy_employee', 'uses' => 'EmployeesController@destroy']);