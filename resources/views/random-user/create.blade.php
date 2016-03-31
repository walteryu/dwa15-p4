@extends('layouts.master')

@section('title')
    Random User Generator
@stop

@section('head')
    <link href="/css/random-user.css" type='text/css' rel='stylesheet'>
@stop

@section('content')
    <br><h2>Create Random Users</h2>

    <blockquote class="blockquote">
        Create random users below by entering the number between 0-9 and options
    </blockquote>

    <form id="random-user" method='POST' action='/random-user/create'>

        {{ csrf_field() }}

        <div class='form-group'>
            <div class="container">
                <div class="error">
                    @if(count($errors) > 0)
                        <!-- Reference: https://laravel.com/docs/6.2/validation -->
                        <div class="col-md-4 alert alert-danger">
                            Please correct the errors below and try again:
                            <p>
                            @foreach ( $errors->all() as $error )
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <label>* User Count (Between 0-9):</label>
            <input
                type='number'
                id='count'
                name='count'
                value='{{ old('count') }}'
            >
        </div>

        <div class='form-group'>
            <input
                type='checkbox'
                id='add_email'
                name='add_email'
                value='add_email'
            >
            <label>Generate User Email?</label>
        </div>

        <div class='form-group'>
            <input
                type='checkbox'
                id='add_address'
                name='add_address'
                value='add_address'
            >
            <label>Generate User Address?</label>
        </div>

        <button type="submit" class="btn btn-primary">Create Random Users</button>

        <section>
            <h2>Random User Data</h2>
            <table class="table">
                <thead>
                    <tr>
                        <h3>
                            Random User Name, Email Address & Street Address Listed Below
                        </h3>
                    </tr>
                </thead>

                <tbody>
                    @forelse($user_data as $users)
                        <tr>
                            <td>
                                @foreach($users as $user)
                                    <p>{{ $user }}
                                @endforeach
                            </td>
                        </tr>
                    @empty
                        <h2>No User Generated Yet</h2>
                    @endforelse
                </tbody>
            </table>
        </section>
    </form>
@stop
