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
    <h2>Lorem Ipsum Generator</h2>
    <h4>
      <a href="/lorem-ipsum/create">Generate Random Text Here...</a>
    </h4>

    <h2>Random User Generator</h2>
    <h4>
      <a href="/random-user/create">Generate Random Users Here...</a>
    </h4>
@stop

{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}

@section('body')
    <script src="/js/lorem-ipsum/index.js"></script>
@stop
