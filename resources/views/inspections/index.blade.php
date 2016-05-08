@extends('layouts.master')

@section('title')
    StormSafe | All Inspections
@stop

@section('head')
    <link href='/css/inspection.css' rel='stylesheet'>
@stop

@section('content')
    <div class='widget'>
        <h2>All Inspections</h2>
        <h3>
            <a href='/inspection/create'>Create Inspection</a>
            |
            <a href='/projects'>View All Projects</a>
        </h3>
    </div>

    @foreach($inspections as $inspection)
        <section class='inspection'>
            <div class="well well-large">
                <h3>
                    Project ID:&nbsp;
                    {{ $inspection->project_id }}
                </h3>
                <h3>
                    Inspection ID:&nbsp;
                    {{ $inspection->id }}
                </h3>
                <h3>
                    Name:&nbsp;
                    {{ $inspection->name }}
                </h3>
                <h3>
                    Description:&nbsp;
                    {{ $inspection->description }}
                </h3>
                <h3>
                    <a href='/inspection/show/{{$inspection->id}}'>View inspection</a>
                    |
                    <a href='/inspection/edit/{{$inspection->id}}'>Edit inspection</a>
                </h3>
                <br>
                    <button type="button" class="btn btn-danger" href='/inspection/delete/{{$inspection->id}}'>
                        Delete Inspection
                    </button>
                </br>
            </div>
        </section>
    @endforeach
@stop
