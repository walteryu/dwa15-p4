@extends('layouts.master')

@section('head')
    <link href='/css/projects_index.css' rel='stylesheet'>
@stop

@section('title')
    StormSafe | All Projects
@stop

@section('content')

    <div class='widget'>
        <h2>All Projects</h2>
        <h3>
            <a href='/project/create'>Create Project</a>
            |
            <a href='/inspections'>View All Inspections</a>
        </h3>
    </div>

    @foreach($projects as $project)
        <section class='project'>
            <div class="well well-large">
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
            </div>
        </section>
    @endforeach

@stop
