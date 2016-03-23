@extends('layouts.master')

@section('title')
    Show Random Text
@stop

@section('head')
    <link href="/css/lorem-ipsum.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
    <br><h3>Random Text Below</h3>
    @if(isset($paragraphs))
        {{ implode('<p>', $paragraphs) }}
    @else
        <h2>No Random Text Generated Yet</h2>
    @endif
@stop

@section('body')
    <script src="/js/lorem-ipsum.js"></script>
@stop
