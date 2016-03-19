@extends('layouts.master')

@section('title')
    Create Some Lorem
@stop

{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}

@section('head')
    <link href="/css/lorem-ipsum.css" type='text/css' rel='stylesheet'>
@stop

@section('content')

    <h3>Create Some Lorem</h3>

    <form method='POST' action='/lorem-ipsum/create'>

        {{ csrf_field() }}

        <div class='form-group'>
           <label>* Paragraph Count (Between 0-9):</label>
           <input
               type='number'
               id='count'
               name='count'
               value='{{ old('count') }}'
           >
           <div class='error'>{{ $errors->first('count') }}</div>
        </div>

        <button type="submit" class="btn btn-primary">Add Some Lorem!</button>

        <section>
            <br>
            @if(isset($paragraphs))
                {{ implode('<p>', $paragraphs) }}
            @else
                <h3>No Lorem Yet!</h3>
            @endif
        </section>

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
