@extends('layouts.master')

@section('title')
    Search for a book
@stop

@section('head')
    <link href='/css/search.css' rel='stylesheet'>
@stop

@section('content')

    <h1>Search for a book</h1>

    <form method='POST'>

        {{ csrf_field() }}

        <div class='form-group'>
           <label>Search for a book title, e.g. 'Gatsby' or 'Caged Bird':</label>
            <input
                type='text'
                id='searchTerm'
                name='searchTerm'
            >
            <i id='loading' class="fa fa-refresh fa-spin"></i>
        </div>

        <h2>Results:</h2>
        <div id='results'></div>

    </form>

@stop

@section('body')
    <script src="/js/search.js"></script>
@stop
