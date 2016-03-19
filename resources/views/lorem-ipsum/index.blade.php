@extends('layouts.master')

@section('title')
  Lorem Ipsum Generator
@stop

{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}

@section('head')
    <link href="/css/lorem-ipsum/index.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
    <h3>Lorem Ipsum Generator</h3>

    <form method='POST' action='/lorem-ipsum/create'>

        {{ csrf_field() }}

        <div class='form-group'>
           <label>* Paragraph Count:</label>
           <input
               type='number'
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

{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}

@section('body')
    <script src="/js/lorem-ipsum/index.js"></script>
@stop
