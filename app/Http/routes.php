<?php

Route::group(['middleware' => ['web']], function () {

  Route::get('/', function () {
    return view('lorem-ipsum/index');
  });

  Route::get('/lorem-output/{number}', function($number) {
    $generator = new LoremIpsumGenerator();
    $paragraphs = $generator->getParagraphs($number);
    echo implode('<p>', $paragraphs);

    return view('lorem-ipsum/index');
  });

  # Return random users
  Route::get('/faker-output', function() {
    $user = Faker\Factory::create();
    echo $user->name.'<br>';
    echo $user->email.'<br>';
    echo $user->address.'<br>';
  });

  Route::get('/lorem-ipsum', 'LoremIpsumController@getIndex');
  Route::get('/lorem-ipsum/create', 'LoremIpsumController@getCreate');
  Route::post('/lorem-ipsum/create', 'LoremIpsumController@postCreate');
  Route::get('/lorem-ipsum/show/{count?}', 'LoremIpsumController@getShow');

  Route::get('/random-user', 'RandomUserController@getIndex');
  Route::get('/random-user/create', 'RandomUserController@getCreate');
  Route::post('/random-user/create', 'RandomUserController@postCreate');
  Route::get('/random-user/show/{count?}', 'RandomUserController@getShow');
});
