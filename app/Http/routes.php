<?php

Route::group(['middleware' => ['web']], function () {

  Route::get('/', function () {
    # return view('welcome');
    return 'Hello, welcome to my new Laravel application!';
  });

  Route::get('/book/{title}', function ($title) {
    return 'Show an individual book: '.$title;
  });

  Route::get('/books', function () {
    return 'Show a list of all books';
  });

  Route::get('/book/create', function () {
    $view = '<form>';
    $view = '<input type="text" name="title">';
    $view = '</form>';
  });

});
