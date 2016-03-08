<?php

namespace P3\Http\Controllers;

use P3\Http\Controllers\Controller;

class BookController extends Controller {

  /**
   * Responds to requests to GET /books
   */
  public function getIndex() {
    return 'Show a list of all books';
  }

  /**
    * Responds to requests to GET /books/show/{id}
    */

  # Passes in no title by default
  public function getShow($title = null) {
    return view('books.show')->with('title', $title);
  }

  /**
   * Responds to requests to GET /books/new
   */
  public function getNew() {
    return view('books.new');
  }

  /**
   * Responds to requests to GET /books/create
   */
  public function getCreate() {
    # $view  = '<form method="POST" action="/book/create">';
    # $view .= csrf_field();
    # $view .= 'Book title: <input type="text" name="title">';
    # $view .= '<input type="submit">';
    # $view .= '</form>';
    # return $view;

    return view('books.create');
  }

  /**
   * Responds to requests to POST /books/create
   */
  public function postCreate() {
    return 'Add the book: '.$_POST['title'];
  }

} # eoc
