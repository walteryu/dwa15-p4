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
            <a href='/inspection/search'>Search Inspections</a>
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
                    <a href='/inspection/show/{{$inspection->id}}'>View Inspection</a>
                    |
                    <a href='/inspection/edit/{{$inspection->id}}'>Edit Inspection</a>
                    |
                    <a href='/inspection/confirm-delete/{{$inspection->id}}'
                        class="btn btn-danger" role="button">Delete Inspection</a>
                </h3>
            </div>
        </section>
    @endforeach
@stop
