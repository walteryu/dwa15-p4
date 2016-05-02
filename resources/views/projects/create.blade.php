@extends('layouts.master')

@section('title')
    StormSafe | Add Project
@stop

@section('content')

    <h1>Add New Project</h1>

    <form method='POST' action='/project/create'>

        {{ csrf_field() }}

        <div class='form-group'>
           <label>Name:</label>
            <input
                type='text'
                id='name'
                name='name'
                value='{{ old('name', 'e.g. Oakland Airport') }}'
            >
           <div class='error'>{{ $errors->first('name') }}</div>
        </div>

        <div class='form-group'>
           <label>Description:</label>
           <input
               type='text'
               id='description'
               name='description'
               value='{{ old('description', 'e.g. Runway Improvement') }}'
           >
           <div class='error'>{{ $errors->first('description') }}</div>
        </div>

        <div class='form-group'>
           <label>Street Address:</label>
           <input
               type='text'
               id='address'
               name='address'
               value='{{ old('address', 'e.g. 1 Airport Drive') }}'
           >
           <div class='error'>{{ $errors->first('address') }}</div>
        </div>

        <div class='form-group'>
           <label>City:</label>
           <input
               type='text'
               id='city'
               name='city'
               value='{{ old('city', 'e.g. Oakland') }}'
           >
           <div class='error'>{{ $errors->first('city') }}</div>
        </div>

        <div class='form-group'>
           <label>State (Please enter 2-letter abbreviation, e.g. CA):</label>
           <input
               type='text'
               id='state'
               name='state'
               value='{{ old('state', 'e.g. CA') }}'
           >
           <div class='error'>{{ $errors->first('state') }}</div>
        </div>

        <div class='form-group'>
           <label>Zipcode:</label>
           <input
               type='text'
               id='zipcode'
               name='zipcode'
               value='{{ old('zipcode', 'e.g. 94621') }}'
           >
           <div class='error'>{{ $errors->first('zipcode') }}</div>
        </div>

        <div class='form-instructions'>
            All fields are required
        </div>

        <button type="submit" class="btn btn-primary">Add Project</button>

        {{--
        <ul class=''>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        --}}

        <div class='error'>
            @if(count($errors) > 0)
                Please correct the errors above and try again.
            @endif
        </div>

    </form>

@stop
