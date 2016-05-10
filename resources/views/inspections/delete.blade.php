@extends('layouts.master')

@section('title')
    StormSafe | Delete Inspection
@stop

@section('head')
    <link href='/css/inspection.css' rel='stylesheet'>
@stop

@section('content')

    <h2>Delete Inspection?</h2>

    <form method='POST' action='/inspection/delete'>

        {{ csrf_field() }}

        @foreach( $inspection as $key => $value )
            <!-- Hidden fields for passing back values to controller -->
            <div hidden class='form-group'>
               <label>Project ID:</label>
                <input
                    type='text'
                    id='id'
                    name='id'
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

            <h3>
                Project ID:&nbsp;
                {{ $value->project_id }}
            </h3>
            <h3>
                Inspection ID:&nbsp;
                {{ $value->id }}
            </h3>
            <h3>
                Name:&nbsp;
                {{ $value->name }}
            </h3>
            <h3>
                Description:&nbsp;
                {{ $value->description }}
            </h3>
        @endforeach

        <br>
            <button type="submit" class="btn btn-primary">Delete Inspection</button>
        </br>

        <div class='error'>
            @if(count($errors) > 0)
                Please correct the errors above and try again.
            @endif
        </div>

    </form>

@stop
