@extends('layouts.master')

@section('title')
    Random User Generator
@stop

@section('head')
    <link href="/css/random-user.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
    <br><h2>Random Users Below</h2>
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

@section('body')
    <script src="/js/random-user.js"></script>
@stop
