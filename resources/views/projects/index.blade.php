@extends('layouts.master')

@section('head')
    <link href='/css/projects_index.css' rel='stylesheet'>
@stop

@section('title')
    StormSafe | All Projects
@stop

@section('content')

    <h2>All Projects</h2>

    @foreach($projects as $project)
        <section class='project'>
            <h2>{{ $project->name }}</h2>
            <h3>{{ $project->description }}</h3>

            <br><a href='/project/edit/{{$project->id}}'>Edit</a>
        </section>
    @endforeach

@stop
