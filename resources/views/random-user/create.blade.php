@extends('layouts.master')

@section('title')
    Random User Generator
@stop

@section('head')
    <link href="/css/random-user.css" type='text/css' rel='stylesheet'>
    <script src="/js/random-user.js"></script>
@stop

@section('content')
    <br><h3>Create Random Users</h3>
    <blockquote class="blockquote">
        Create random users below by entering the number between 0-9 and options
    </blockquote>

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

        <div class='form-group'>
           <input
               type='checkbox'
               id='add_email'
               name='add_email'
               value='{{ old('add_email') }}'
           >
           <label>Generate User Email?</label>
           <div class='error'>{{ $errors->first('add_email') }}</div>
        </div>
 
        <div class='form-group'>
           <input
               type='checkbox'
               id='add_address'
               name='add_address'
               value='{{ old('add_address') }}'
           >
           <label>Generate User Address?</label>
           <div class='error'>{{ $errors->first('add_address') }}</div>
        </div>

        <button type="submit" class="btn btn-primary">Create Random Users</button>

        <section>
          <h3>Random Users Below</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>User Address</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($user_data as $users)
                        <td>
                            @foreach($users as $user)
                                <p>
                                {{ $user }}
                            @endforeach
                        </td>
                    @empty
                        <h3>No User Generated Yet</h3>
                    @endforelse
                </tbody>
            </table>
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
