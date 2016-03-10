<?php

# Currently rooted to public/dir in htdocs/MAMP
Route::group(['middleware' => ['web']], function () {

  Route::get('/', function () {
    return view('welcome');
  });

  Route::get('/env', function() {
    echo 'Your current environment: ';
    echo App::environment();
  });

  Route::get('/random-text', function() {
    $generator = new LoremIpsumGenerator();
    $paragraphs = $generator->getParagraphs(5);
    echo implode('<p>', $paragraphs);
  });

  Route::get('/books', 'BookController@getIndex');
  Route::get('/book/new', 'BookController@getNew');
  Route::post('/book/new', 'BookController@postNew');
  Route::get('/book/create', 'BookController@getCreate');
  Route::post('/book/create', 'BookController@postCreate');
  Route::get('/book/show/{title?}', 'BookController@getShow');

  Route::get('/books/{category}', function($category) {
    return 'Here are all the books in the category of '.$category;
  });

  Route::get('/lorem-ipsum', 'LoremIpsumController@getIndex');
  Route::get('/random-user', 'RandomUserController@getIndex');

});
