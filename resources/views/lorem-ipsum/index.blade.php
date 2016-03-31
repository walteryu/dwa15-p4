@extends('layouts.master')

@section('title')
    Lorem Ipsum Generator
@stop

@section('head')
    <link href="/css/lorem-ipsum.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
    <h3>
        Welcome! Pacific Standard Time (PST) is now: {{ $date_time }}
    </h3>

    <br><h2>Lorem Ipsum Generator</h2>
    <blockquote class="blockquote">
        Random text is useful in web development and publishing as a spaceholder for
        layout/planning purposes;<p>
        This application generates random Latin text (Lorem Ipsum) and offers text shuffling.
    </blockquote>
    <h3>
        <a href="/lorem-ipsum/create">Generate Random Text Here...</a>
    </h3>

    <br><h2>Random User Generator</h2>
    <blockquote class="blockquote">
        Random users are useful in web development for testing and development purposes;<p>
        This application generates user name, email and street address.
    </blockquote>
    <h3>
        <a href="/random-user/create">Generate Random Users Here...</a>
    </h3>
@stop
