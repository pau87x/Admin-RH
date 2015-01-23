<?php

Route::get('candidates', ['as' => 'candidates', 'uses' => 'CandidatesController@show']);

Route::get('candidate/register', ['as' => 'new_candidate', 'uses' => 'CandidatesController@create']);
Route::post('candidate/register', ['as' => 'save_new_candidate', 'uses' => 'CandidatesController@register']);

Route::get('candidate/{id}', ['as' => 'show_candidate', 'uses' => 'CandidatesController@showCandidate']);

Route::get('candidate/update/{id}', ['as' => 'edit_candidate', 'uses' => 'CandidatesController@edit']);
Route::put('candidate/update/{id}', ['as' => 'update_candidate', 'uses' => 'CandidatesController@update']);

Route::get('excel/candidates/', ['as' => 'excel_candidates', 'uses' => 'CandidatesController@toExcel']);


Route::get('reclute/{id}', ['as' => 'reclute_candidate', 'uses' => 'CandidatesController@reclute']);
Route::post('employees/reclute/{id}', ['as' => 'reclute_new_employee', 'uses' => 'EmployeesController@registerReclute']);


Route::get('positions', ['as' => 'positions', 'uses' => 'PositionsController@show']);
Route::get('positions/register', ['as' => 'new_position', 'uses' => 'PositionsController@create']);
Route::post('positions/register', ['as' => 'save_new_position', 'uses' => 'PositionsController@register']);

Route::get('positions/update/{id}', ['as' => 'edit_position', 'uses' => 'PositionsController@edit']);
Route::put('positions/update/{id}', ['as' => 'update_position', 'uses' => 'PositionsController@update']);


Route::get('candidate/education/{id}', ['as' => 'add_education', 'uses' => 'EducationController@create']);
Route::post('candidate/education/{id}', ['as' => 'register_education', 'uses' => 'EducationController@register']);

Route::get('candidate/education/update/{id}', ['as' => 'edit_education', 'uses' => 'EducationController@edit']);
Route::put('candidate/education/update/{id}', ['as' => 'update_education', 'uses' => 'EducationController@update']);

Route::get('candidate/education/delete/{id}', ['as' => 'delete_education', 'uses' => 'EducationController@delete']);
Route::delete('candidate/education/deleting/{id}', ['as' => 'destroy_education', 'uses' => 'EducationController@destroy']);



Route::get('candidate/experience/{id}', ['as' => 'add_experience', 'uses' => 'ExperiencesController@create']);
Route::post('candidate/experience/{id}', ['as' => 'register_experience', 'uses' => 'ExperiencesController@register']);

Route::get('candidate/experience/update/{id}', ['as' => 'edit_experience', 'uses' => 'ExperiencesController@edit']);
Route::put('candidate/experience/update/{id}', ['as' => 'update_experience', 'uses' => 'ExperiencesController@update']);

Route::get('candidate/experience/delete/{id}', ['as' => 'delete_experience', 'uses' => 'ExperiencesController@delete']);
Route::delete('candidate/experience/deleting/{id}', ['as' => 'destroy_experience', 'uses' => 'ExperiencesController@destroy']);