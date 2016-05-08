@extends('layouts.master')

@section('title')
    StormSafe | Create Inspection
@stop

@section('head')
    <link href='/css/inspection.css' rel='stylesheet'>
@stop

@section('content')

    <h1>Create Inspection</h1>

    <form method='POST' action='/inspection/create'>

        {{ csrf_field() }}

        <div class='form-group'>
           <label for='project_id'>Project:</label>
           <select name='project_id' id='project_id'>
               @foreach($projects_menu as $project_id => $project_name)
                    <option value='{{$project_id}}'>
                        {{$project_name}}
                    </option>
                @endforeach
           </select>
           <div class='error'>{{ $errors->first('project_id') }}</div>
        </div>

        <div class='form-group'>
           <label>Name:</label>
            <input
                type='text'
                id='name'
                name='name'
                value='{{ old('name','e.g. Weekly Site Inspection') }}'
            >
           <div class='error'>{{ $errors->first('name') }}</div>
        </div>

        <div class='form-group'>
           <label>Description:</label>
           <input
               type='text'
               id='description'
               name='description'
               value='{{ old('description','e.g. Site Walk with Contractor') }}'
           >
           <div class='error'>{{ $errors->first('description') }}</div>
        </div>

        <div class='form-instructions'>
            All fields are required
        </div>

        <button type="submit" class="btn btn-primary">Create Inspection</button>

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
