@extends('layouts.master')

@section('title')
    StormSafe | Project Chart
@stop

@section('head')
    <link href='/css/project.css' rel='stylesheet'>
@stop

@section('content')
    <div class='well well-large'>
        <h2>Project Count</h2>
        <h4>Total Projects/Inspections</h4>
        <h4>
            Chart Generation: <a href="http://d3js.org/">D3.js</a>
        </h4>
        <br></br>

        <div id="chart"></div>
        <script>
            var chart = c3.generate({
                data: {
                    columns: [
                        ['Projects', {{ array_sum($project_count) }} ],
                        ['Inspections', {{ array_sum($inspection_count) }} ]
                    ],
                    type: 'bar'
                },
                bar: {
                    width: {
                        ratio: 0.5
                    }
                },
                axis: {
                    y: {
                        label: 'Count'
                    }
                }
            });
        </script>
    </div>
@stop

@section('body')
    <script src="/js/project/show.js"></script>
@stop
