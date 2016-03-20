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
    <link href="/css/lorem-ipsum.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
    <h4>
        Welcome! Pacific Standard Time (PST) is now:
        {{ $date_time }}
    </h4>

    <br><h3>Lorem Ipsum Generator</h3>
    <blockquote class="blockquote">
        Random text is useful in web development and publishing as a spaceholder for
        layout/planning purposes;<p>
        This application generates random Latin text (Lorem Ipsum) and offers text shuffling.
    </blockquote>
    <h4>
        <a href="/lorem-ipsum/create">Generate Random Text Here...</a>
    </h4>

    <br><h3>Random User Generator</h3>
    <blockquote class="blockquote">
        Random users are useful in web development for testing and development purposes;<p>
        This application generates user name, email and street address.
    </blockquote>
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
    <script src="/js/lorem-ipsum.js"></script>
@stop
