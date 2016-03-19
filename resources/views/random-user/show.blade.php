@extends('layouts.master')

@section('title')
    Random User Generator
@stop

{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}

@section('head')
    <link href="/css/random-user/index.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
    <h2>Random Users Array...</h2>
    </br>
    @forelse($users as $user)
        <p>
        {{ $user->name }}
        <p>
        {{ $user->email }}
        <p>
        {{ $user->address }}
        <p>
    @empty
        <h2>No User Array Yet!</h2>
    @endforelse
@stop

{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}

@section('body')
    <script src="/js/random-user/index.js"></script>
@stop
