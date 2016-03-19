@extends('layouts.master')

@section('title')
    Show Lorem
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
    <h2>Extra Lorem...</h2>
    @if(isset($paragraphs))
        {{ implode('<p>', $paragraphs) }}
    @else
        <h2>No Lorem Yet!</h2>
    @endif
@stop

{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}

@section('body')
    <script src="/js/lorem-ipsum/index.js"></script>
@stop
