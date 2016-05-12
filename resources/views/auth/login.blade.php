@extends('layouts.master')

@section('title')
    StormSafe | Login
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Welcome to StormSafe</h1>
                <h3>Environmental Compliance Software</h3>
                <iframe width="700" height="500" src="https://www.youtube.com/embed/T1dfGAIYniw" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="col-md-4">
                <h1>User Login</h1>
                <h3>Not Registered? <a href='/register'>Register Here</a></h3>

                @if(count($errors) > 0)
                    <ul class='errors'>
                        @foreach ($errors->all() as $error)
                            <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <form method='POST' action='/login'>
                    {!! csrf_field() !!}

                    <br>
                    <div class='form-group'>
                        <label for='email'>Email</label>
                        <input type='text' name='email' id='email' value='{{ old('email') }}'>
                    </div>

                    <div class='form-group'>
                        <label for='password'>Password</label>
                        <input type='password' name='password' id='password' value='{{ old('password') }}'>
                    </div>

                    <div class='form-group'>
                        <input type='checkbox' name='remember' id='remember'>
                        <label for='remember' class='checkboxLabel'>Remember me</label>
                    </div>

                    <button type='submit' class='btn btn-primary'>Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
