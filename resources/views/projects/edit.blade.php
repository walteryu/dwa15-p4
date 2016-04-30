@extends('layouts.master')

@section('title')
    StormSafe | Edit Project
@stop

@section('content')

    <h1>Edit Project</h1>

    <form method='POST' action='/project/edit'>

        {{ csrf_field() }}

        <div class='form-group'>
           <label>Name:</label>
            <input
                type='text'
                id='name'
                name='name'
                value='{{ old('name','Required') }}'
            >
           <div class='error'>{{ $errors->first('name') }}</div>
        </div>

        <div class='form-group'>
           <label>Description:</label>
            <input
                type='text'
                id='description'
                name='description'
                value='{{ old('name','Required') }}'
            >
           <div class='error'>{{ $errors->first('description') }}</div>
        </div>

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
