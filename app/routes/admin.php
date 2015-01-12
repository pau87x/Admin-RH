<?php

Route::get('admin/candidate/{id}', ['as' => 'admin_candidate_edit', function ($id) {

    return 'Editando el candidato ' . $id;

}]);

Route::get('employee/delete/{id}', ['as' => 'delete_employee', 'uses' => 'EmployeesController@delete']);
Route::put('employee/delete/{id}', ['as' => 'ejecute_delete_employee', 'uses' => 'EmployeesController@ejecuteDelete']);