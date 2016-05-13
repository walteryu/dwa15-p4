<?php

Route::group(['middleware' => ['web']], function () {
    Route::get('/login', 'Auth\AuthController@getLogin');
    Route::post('/login', 'Auth\AuthController@postLogin');

    Route::get('/logout', 'Auth\AuthController@logout');

    Route::get('/logout/confirm',function(){
        session()->flash('message','You have been logged out.');
        return redirect()->to('/login');
    });

    Route::get('/register', 'Auth\AuthController@getRegister');
    Route::post('/register', 'Auth\AuthController@postRegister');

    Route::get('/project/about', 'ProjectController@getAbout');

    Route::group(['middleware' => 'auth'], function() {
        Route::get('/', 'ProjectController@getIndex');

        Route::get('/users', 'UserController@getIndex');

        Route::get('/user/create', 'UserController@getCreate');
        Route::post('/user/create', 'UserController@postCreate');
        Route::get('/user/edit/{id?}', 'UserController@getEdit');
        Route::post('/user/edit', 'UserController@postEdit');

        Route::get('/user/confirm-delete/{id?}', 'UserController@getDelete');
        Route::get('/user/show/{id?}', 'UserController@getShow');

        Route::get('/projects', 'ProjectController@getIndex');

        Route::get('/project/create', 'ProjectController@getCreate');
        Route::post('/project/create', 'ProjectController@postCreate');
        Route::get('/project/edit/{id?}', 'ProjectController@getEdit');
        Route::post('/project/edit', 'ProjectController@postEdit');

        Route::get('/project/confirm-delete/{id?}', 'ProjectController@getDelete');
        Route::post('/project/delete', 'ProjectController@postDelete');

        Route::get('/project/show/{id?}', 'ProjectController@getShow');
        Route::get('/project/{id?}/inspections', 'ProjectController@getInspections');

        Route::get('/project/search', 'ProjectController@getSearch');
        Route::post('/project/search', 'ProjectController@postSearch');
        Route::get('/project/chart', 'ProjectController@getChart');

        Route::get('/inspections', 'InspectionController@getIndex');
        Route::get('/inspection/edit/{id?}', 'InspectionController@getEdit');
        Route::post('/inspection/edit', 'InspectionController@postEdit');
        Route::get('/inspection/create', 'InspectionController@getCreate');
        Route::post('/inspection/create', 'InspectionController@postCreate');

        Route::get('/inspection/confirm-delete/{id?}', 'InspectionController@getDelete');
        Route::post('/inspection/delete', 'InspectionController@postDelete');

        Route::get('/inspection/show/{id?}', 'InspectionController@getShow');

        Route::get('/inspection/search', 'InspectionController@getSearch');
        Route::post('/inspection/search', 'InspectionController@postSearch');
    });
});
