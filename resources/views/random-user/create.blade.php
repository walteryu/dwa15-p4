@extends('layouts.master')

@section('title')
    Random User Generator
@stop

{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific stylesheets.
--}}

@section('head')
    <link href="/css/random-user.css" type='text/css' rel='stylesheet'>
@stop

@section('content')

    <h3>Create Some Random Users</h3>

    <form method='POST' action='/random-user/create'>

        {{ csrf_field() }}

        <div class='form-group'>
           <label>* User Count (Between 0-9):</label>
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
          <h3>Random Users Below (Example Shown If None Generated Yet) </h3>
          @forelse($users as $user)
              <p>
              {{ $user->name }}
              <p>
              {{ $user->email }}
              <p>
              {{ $user->address }}
              <p>
          @empty
              <h3>No User Array Yet!</h3>
          @endforelse
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
