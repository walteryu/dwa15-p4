@extends('layouts.master')

@section('title')
    StormSafe | Edit Inspection
@stop

@section('head')
    <link href='/css/inspection.css' rel='stylesheet'>
@stop

@section('content')

    <h2>Edit Inspection</h2>

    <form method='POST' action='/inspection/edit'>

        {{ csrf_field() }}

        @foreach( $inspection as $key => $value )
            <!-- Hidden fields for passing back values to controller -->
            <div hidden class='form-group'>
               <label>Project ID:</label>
                <input
                    type='text'
                    id='project_id'
                    name='project_id'
                    value='{{ $value->project_id }}'
                >
               <label>Inspection ID:</label>
                <input
                    type='text'
                    id='id'
                    name='id'
                    value='{{ $value->id }}'
                >
            </div>

            <div class='form-group'>
               <label>Name:</label>
                <input
                    type='text'
                    id='name'
                    name='name'
                    value='{{ old('name',$value->name) }}'
                >
               <div class='error'>{{ $errors->first('name') }}</div>
            </div>

            <div class='form-group'>
               <label>Description:</label>
                <input
                    type='text'
                    id='description'
                    name='description'
                    value='{{ old('name',$value->description) }}'
                >
               <div class='error'>{{ $errors->first('description') }}</div>
            </div>
        @endforeach

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
