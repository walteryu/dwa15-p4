@extends('layouts.master')

@section('title')
    Create Some Lorem
@stop

@section('content')

    <h1>Create Some Lorem</h1>

    <form method='POST' action='/lorem-ipsum/create'>

        {{ csrf_field() }}

        <div class='form-group'>
           <label>* Paragraph Count:</label>
           <input
               type='text'
               id='count'
               name='count'
               value='{{ old('count') }}'
           >
           <div class='error'>{{ $errors->first('count') }}</div>
        </div>

        <!--
          <div class='form-group'>
             <label>* Author:</label>
             <input
                 type='text'
                 id='author'
                 name='author'
                 value='{{ old('author') }}'
             >
             <div class='error'>{{ $errors->first('author') }}</div>
          </div>
        -->

        <button type="submit" class="btn btn-primary">Add Some Lorem!</button>

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
