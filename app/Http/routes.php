<?php

# Currently rooted to public/dir in htdocs/MAMP
Route::group(['middleware' => ['web']], function () {

  # Examples from lecture notes
  Route::get('/', function () {
    # return view('welcome');
    return 'Hello, welcome to my new Laravel application!';
  });

  Route::get('/books', 'BookController@getIndex');
  Route::get('/book/create', 'BookController@getCreate');
  Route::post('/book/create', 'BookController@postCreate');

  # Route::get('/book/{id}', 'BookController@getShow');
  Route::get('/books/show/{title?}', 'BookController@getShow');

  Route::get('/books/{category}', function($category) {
    return 'Here are all the books in the category of '.$category;
  });

  Route::get('/new', function() {
    $view  = '<form method="POST">';
    $view .= csrf_field();
    $view .= 'Title: <input type="text" name="title">';
    $view .= '<input type="submit">';
    $view .= '</form>';
    return $view;
  });

  Route::post('/new', function() {
    $input = Input::all();
    print_r($input);
  });

  Route::get('/practice', function() {
    echo 'Hello World!';
  });

});
