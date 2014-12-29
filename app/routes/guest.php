<?php 

    Route::get('sign-up', ['as' => 'sign_up', 'uses' => 'UsersController@signUp']);
    Route::post('sign-up', ['as' => 'register', 'uses' => 'UsersController@register']);

    Route::post('login', ['as' => 'login', 'uses' => 'AuthController@login']);