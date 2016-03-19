<?php

# Rooted to public/dir in htdocs/MAMP
Route::group(['middleware' => ['web']], function () {

  Route::get('/', function () {
    return view('welcome');
  });

  Route::get('/env', function() {
    echo 'Your current environment: ';
    echo App::environment();
  });

  Route::get('/books/{category}', function($category) {
    return 'Books with category: '.$category;
  });

  Route::get('/books', 'BookController@getIndex');
  Route::get('/book/new', 'BookController@getNew');
  Route::post('/book/new', 'BookController@postNew');
  Route::get('/book/create', 'BookController@getCreate');
  Route::post('/book/create', 'BookController@postCreate');
  Route::get('/book/show/{title?}', 'BookController@getShow');

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
  Route::get('/lorem-ipsum/show/{count}', 'LoremIpsumController@getShow');

  Route::get('/random-user', 'RandomUserController@getIndex');
});
