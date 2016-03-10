@extends('layouts.master')

@section('title')
  Lorem Ipsum Generator
@stop

{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}

@section('head')
    <link href="/css/lorem-ipsum/index.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
    <h3>Lorem Ipsum Generator</h3>

    <div class="form-group">
      <p>
        <label for="count">Number of Words? </label>
        <input type="number" id="count" name="count" min="1" max="9">
        <label for="count"> (Between 1-9)</label>
      </p>
      <p>
        <input type="checkbox" id="numbers" name="numbers" value="add_number">
        <label for="numbers">Add a Number to Last Passphrase?</label>
      </p>
      <p>
        <input type="checkbox" id="characters" name="characters" value="add_char">
        <label for="characters">Add a Character to Last Passphrase?</label>
      </p>
      <p>
        <input type="checkbox" id="shuffle" name="shuffle" value="shuffle_words">
        <label for="shuffle">Shuffle Passphrases Again After Selection?</label>
      </p>
      <p>
        <button type="submit" class="btn btn-primary">Generate Random Text</button>
      </p>
    </div>
@stop

{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}

@section('body')
    <script src="/js/lorem-ipsum/index.js"></script>
@stop
