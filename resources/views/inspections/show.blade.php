@extends('layouts.master')

@section('title')
    StormSafe | Show Inspection
@stop

@section('head')
    <link href='/css/project_show.css' rel='stylesheet'>
@stop

@section('content')
    <div class='widget'>
        <h2>Show Inspection</h2>
    </div>

    <section class='project'>
        <div class="well well-large">
            @foreach( $inspection as $key => $value )
                <h3>
                    <a href='/inspection/edit/{{$value->id}}'>Edit Inspection</a>
                    |
                    <a href='/projects'>View All Projects</a>
                </h3>
                <h3>
                    **Add Project Name Here**
                </h3>
                <h3>
                  Inspection ID:&nbsp;
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
            @endforeach
        </div>
    </section>
@stop

@section('body')
    <script src="/js/project/show.js"></script>
@stop
