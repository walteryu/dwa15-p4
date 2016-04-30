@extends('layouts.master')

@section('title')
    StormSafe | Show Project
@stop

@section('head')
    <link href='/css/project_show.css' rel='stylesheet'>
@stop

@section('content')
    <section class='project'>
        <div class="well well-large">
            @foreach( $project as $key => $value )
                <h3>
                  Project ID:&nbsp;
                  {{ $value->id }}
                  <br>
                  Project Name:&nbsp;
                  {{ $value->name }}
                  <br>
                  Project Description:&nbsp;
                  {{ $value->description }}
                </h3>
            @endforeach
        </div>
    </section>
@stop

@section('body')
    <script src="/js/project/show.js"></script>
@stop
