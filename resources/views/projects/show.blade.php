@extends('layouts.master')

@section('title')
    StormSafe | Show Project
@stop

@section('head')
    <link href='/css/project_show.css' rel='stylesheet'>
@stop

@section('content')
    <div class='widget'>
        <h2>Show Project</h2>
    </div>

    <section class='project'>
        <div class="well well-large">
            @foreach( $project as $key => $value )
                <h3>
                    <a href='/project/edit/{{$value->id}}'>Edit Project</a>
                    |
                    <a href='/inspections'>View All Inspections</a>
                </h3>
                <h3>
                  Project ID:&nbsp;
                  {{ $value->id }}
                  <br>
                </h3>
                <h3>
                  Project Name:&nbsp;
                  {{ $value->name }}
                  <br>
                </h3>
                <h3>
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
