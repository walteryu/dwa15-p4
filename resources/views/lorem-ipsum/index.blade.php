@extends('layouts.master')

@section('title')
    Lorem Ipsum Generator
@stop

@section('head')
    <link href="/css/lorem-ipsum.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
    <h5>
        Welcome! Pacific Standard Time (PST) is now: {{ $date_time }}
    </h5>

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

@section('body')
    <script src="/js/lorem-ipsum.js"></script>
@stop
