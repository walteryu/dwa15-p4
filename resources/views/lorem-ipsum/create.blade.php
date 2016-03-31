@extends('layouts.master')

@section('title')
    Create Random Text
@stop

@section('head')
    <link href="/css/lorem-ipsum.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
    <br><h2>Create Random Text</h2>

    <blockquote class="blockquote">
        Create random text below by entering the number between 0-9 and options
    </blockquote>

    <form method='POST' action='/lorem-ipsum/create'>

        {{ csrf_field() }}

        <div class='form-group'>
            <div class="container">
                <div class="error">
                    @if(count($errors) > 0)
                        <!-- Reference: https://laravel.com/docs/6.2/validation -->
                        <div class="col-md-4 alert alert-danger">
                            Please correct the errors below and try again:
                            <p>
                            @foreach ( $errors->all() as $error )
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

           <label>* Paragraph Count (Between 0-9):</label>
           <input
               type='number'
               id='count'
               name='count'
               value='{{ old('count') }}'
           >
        </div>

        <div class='form-group'>
           <input
               type='checkbox'
               id='add_random'
               name='add_random'
               value='{{ old('add_random') }}'
           >
           <label>Shuffle Paragraphs?</label>
        </div>

        <button type="submit" class="btn btn-primary">Create Random Text</button>
        <br>

        @forelse($paragraphs as $paragraph)
            <p>{{ $paragraph }}
        @empty
            <h3>No Random Text Generated Yet</h3>
        @endforelse
    </form>
@stop
