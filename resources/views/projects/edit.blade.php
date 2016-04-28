@extends('layouts.master')

@section('title')
    StormSafe | Edit Project {{ $project->title }}
@stop

@section('content')

    <h1>Edit project {{ $project->title }}</h1>

    <form method='POST' action='/project/edit'>

        <input type='hidden' name='id' value='{{$project->id}}'>

        {{ csrf_field() }}

        <div class='form-group'>
           <label>Name:</label>
            <input
                type='text'
                id='name'
                name='name'
                value='{{ $project->name }}'
            >
           <div class='error'>{{ $errors->first('name') }}</div>
        </div>

        <div class='form-group'>
           <label>Description:</label>
            <input
                type='text'
                id='description'
                description='description'
                value='{{ $project->description }}'
            >
           <div class='error'>{{ $errors->first('description') }}</div>
        </div>

        <!--
        <div class='form-group'>
           <label for='author_id'>Author:</label>
           <select name='author_id' id='author_id'>
               @foreach($authors_for_dropdown as $author_id => $author_name)
                    <option value='{{$author_id}}' {{ ($project->author_id == $author_id) ? 'SELECTED' : '' }}>
                        {{$author_name}}
                    </option>
                @endforeach
           </select>
           <div class='error'>{{ $errors->first('author') }}</div>
        </div>
        -->

        <div class='form-instructions'>
            All fields are required
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>

        <div class='error'>
            @if(count($errors) > 0)
                Please correct the errors above and try again.
            @endif
        </div>

    </form>

@stop
