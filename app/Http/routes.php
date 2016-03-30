<?php
Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'LoremIpsumController@getIndex');
    Route::get('/lorem-ipsum', 'LoremIpsumController@getIndex');
    Route::get('/lorem-ipsum/create', 'LoremIpsumController@getCreate');
    Route::post('/lorem-ipsum/create', 'LoremIpsumController@postCreate');

    Route::get('/random-user', 'RandomUserController@getIndex');
    Route::get('/random-user/create', 'RandomUserController@getCreate');
    Route::post('/random-user/create', 'RandomUserController@postCreate');
});
