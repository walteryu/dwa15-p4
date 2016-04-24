@extends('layouts.master')

@section('title')
    Show Project {{ $name}}
@stop

@section('head')
    <link href='/css/project/show.css' rel='stylesheet'>
@stop

@section('content')
    @if(isset($title))
        <h1>Show Project: {{ $name }}</h1>
    @else
        <h1>No Project Selected</h1>
    @endif
@stop

@section('body')
    <script src="/js/project/show.js"></script>
@stop
