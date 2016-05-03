@extends('layouts.master')

@section('title')
    StormSafe | Delete Project
@stop

@section('content')

    <h2>Delete This Project?</h2>

    <form method='POST' action='/project/delete'>

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

            <h3>
                <a href='/project/edit/{{$value->id}}'>Edit Project</a>
                |
                <a href='/inspections'>View All Inspections</a>
            </h3>
            <h3>
                User ID:&nbsp;
                {{ $value->user_id }}
            </h3>
            <h3>
                Project ID:&nbsp;
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
            <h3>
                Street Address:&nbsp;
                {{ $value->address}}
            </h3>
            <h3>
                City:&nbsp;
                {{ $value->city}}
            </h3>
            <h3>
                State:&nbsp;
                {{ $value->state}}
            </h3>
            <h3>
                Zipcode:&nbsp;
                {{ $value->zipcode}}
            </h3>
        @endforeach

        <br>
            <button type="submit" class="btn btn-primary">Delete Project</button>
        </br>

        <div class='error'>
            @if(count($errors) > 0)
                Please correct the errors above and try again.
            @endif
        </div>

    </form>

@stop
