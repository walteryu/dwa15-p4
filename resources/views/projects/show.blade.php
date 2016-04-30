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
            {{ dd($project) }}

            <!--
            <h2>
                Name: {{ $project->name }}
            </h2>
            <h3>
                Description: {{ $project->description }}
            </h3>
            <h3>
                Location: {{ $project->city}}, {{ $project->state}}
            </h3>
            <h3>
                <a href='/project/edit/{{$project->id}}'>Edit Project</a>
            </h3>
            -->
        </div>
    </section>
@stop

@section('body')
    <script src="/js/project/show.js"></script>
@stop
