@extends('layouts.master')

@section('title')
    Search Projects
@stop

@section('head')
    <link href='/css/search.css' rel='stylesheet'>
@stop

@section('content')

    <h1>Search Projects</h1>

    <form method='POST'>

        {{ csrf_field() }}

        <div class='form-group'>
           <label>Search By Title or Description, e.g. 'Oakland Airport':</label>
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
    <script src="/js/project-search.js"></script>
@stop
