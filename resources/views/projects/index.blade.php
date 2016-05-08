@extends('layouts.master')

@section('title')
    StormSafe | All Projects
@stop

@section('head')
    <link href='/css/project.css' rel='stylesheet'>
@stop

@section('content')
    <div class='widget'>
        <h2>All Projects</h2>
        <h3>
            <a href='/project/create'>Create Project</a>
            |
            <a href='/project/search'>Search Projects</a>
        </h3>
    </div>

    @foreach($projects as $project)
        <section class='project'>
            <div class="well well-large">
                <h3>
                    User ID:&nbsp;
                    {{ $project->user_id }}
                </h3>
                <h3>
                    Project ID:&nbsp;
                    {{ $project->id }}
                <h3>
                    Name:&nbsp;
                    {{ $project->name }}
                </h3>
                <h3>
                    Description:&nbsp;
                    {{ $project->description }}
                </h3>
                <h3>
                    Location:&nbsp;
                    {{ $project->city }}, {{ $project->state }}
                </h3>
                <h3>
                    <a href='/project/show/{{$project->id}}'>View Project</a>
                    |
                    <a href='/project/edit/{{$project->id}}'>Edit Project</a>
                </h3>
                <br>
                    <a href='/project/confirm-delete/{{$project->id}}'
                        class="btn btn-danger" role="button">Delete Project</a>
                </br>
            </div>
        </section>
    @endforeach

@stop
