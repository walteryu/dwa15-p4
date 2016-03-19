<?php

# Rooted to public/dir in htdocs/MAMP
Route::group(['middleware' => ['web']], function () {

  Route::get('/', function () {
    // return view('welcome');
    return view('lorem-ipsum/index');
  });

  Route::get('/env', function() {
    echo 'Your current environment: ';
    echo App::environment();
  });

  # Returns paragraphs based on number parameter
  Route::get('/lorem-output/{number}', function($number) {
    $generator = new LoremIpsumGenerator();
    $paragraphs = $generator->getParagraphs($number);
    echo implode('<p>', $paragraphs);

    return view('lorem-ipsum/index');
  });

  # Return random users
  Route::get('/faker-output', function() {
    $faker = Faker\Factory::create();
    echo $faker->name.'<br>';
    echo $faker->email.'<br>';
    echo $faker->address.'<br>';
  });

  Route::get('/lorem-ipsum', 'LoremIpsumController@getIndex');
  Route::get('/lorem-ipsum/create', 'LoremIpsumController@getCreate');
  Route::post('/lorem-ipsum/create', 'LoremIpsumController@postCreate');
  Route::get('/lorem-ipsum/show/{count?}', 'LoremIpsumController@getShow');

  Route::get('/random-user', 'RandomUserController@getIndex');
});
