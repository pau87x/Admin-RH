<?php 

    Route::post('login', ['as' => 'login', 'uses' => 'AuthController@login']);