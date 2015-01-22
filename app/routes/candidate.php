<?php

Route::get('candidates', ['as' => 'candidates', 'uses' => 'CandidatesController@show']);

Route::get('candidate/register', ['as' => 'new_candidate', 'uses' => 'CandidatesController@create']);
Route::post('candidate/register', ['as' => 'save_new_candidate', 'uses' => 'CandidatesController@register']);

Route::get('candidate/{id}', ['as' => 'show_candidate', 'uses' => 'CandidatesController@showCandidate']);

Route::get('candidate/update/{id}', ['as' => 'edit_candidate', 'uses' => 'CandidatesController@edit']);
Route::put('candidate/update/{id}', ['as' => 'update_candidate', 'uses' => 'CandidatesController@update']);

Route::get('excel/candidates/', ['as' => 'excel_candidates', 'uses' => 'CandidatesController@toExcel']);

Route::get('positions', ['as' => 'positions', 'uses' => 'PositionsController@show']);
Route::get('positions/register', ['as' => 'new_position', 'uses' => 'PositionsController@create']);
Route::post('positions/register', ['as' => 'save_new_position', 'uses' => 'PositionsController@register']);

Route::get('positions/update/{id}', ['as' => 'edit_position', 'uses' => 'PositionsController@edit']);
Route::put('positions/update/{id}', ['as' => 'update_position', 'uses' => 'PositionsController@update']);
