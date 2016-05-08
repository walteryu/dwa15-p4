@extends('layouts.master')

@section('title')
    StormSafe | Edit Project
@stop

@section('head')
    <link href='/css/project.css' rel='stylesheet'>
@stop

@section('content')

    <h2>Edit Project</h2>

    <form method='POST' action='/project/edit'>

        {{ csrf_field() }}

        @foreach( $project as $key => $value )
            <!-- Hidden fields for passing back values to controller -->
            <div hidden class='form-group'>
               <label>User ID:</label>
                <input
                    type='text'
                    id='id'
                    name='id'
                    value='{{ $value->user_id }}'
                >
               <label>Project ID:</label>
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

            <div class='form-group'>
               <label>Street Address:</label>
                <input
                    type='text'
                    id='address'
                    name='address'
                    value='{{ old('name',$value->address) }}'
                >
               <div class='error'>{{ $errors->first('address') }}</div>
            </div>

            <div class='form-group'>
               <label>City:</label>
                <input
                    type='text'
                    id='city'
                    name='city'
                    value='{{ old('name',$value->city) }}'
                >
               <div class='error'>{{ $errors->first('city') }}</div>
            </div>

            <div class='form-group'>
               <label>State (Please enter 2-letter abbreviation, e.g. CA):</label>
                <input
                    type='text'
                    id='state'
                    name='state'
                    value='{{ old('name',$value->state) }}'
                >
               <div class='error'>{{ $errors->first('state') }}</div>
            </div>

            <div class='form-group'>
               <label>zipcode:</label>
                <input
                    type='text'
                    id='zipcode'
                    name='zipcode'
                    value='{{ old('name',$value->zipcode) }}'
                >
               <div class='error'>{{ $errors->first('zipcode') }}</div>
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
