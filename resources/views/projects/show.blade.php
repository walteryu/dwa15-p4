@extends('layouts.master')

@section('title')
    StormSafe | Show Project
@stop

@section('head')
    <link href='/css/project.css' rel='stylesheet'>
@stop

@section('content')
    <div class='widget'>
        <h2>Show Project</h2>
    </div>

    <section class='project'>
        <div class="well well-large">
            @foreach($project as $key => $value)
                <h3>
                    <a href='/project/edit/{{$value->id}}'>Edit Project</a>
                    |
                    <a href='/project/{{$value->id}}/inspections'>View Inspections</a>
                </h3>
                <h3>
                    Project ID:&nbsp;
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
                <h3>
                    Street Address:&nbsp;
                    {{ $value->address}}
                </h3>
                <h3>
                    City:&nbsp;
                    {{ $value->city}}
                </h3>
                <h3>
                    State:&nbsp;
                    {{ $value->state}}
                </h3>
                <h3>
                    Zipcode:&nbsp;
                    {{ $value->zipcode}}
                </h3>
            @endforeach

            <h3>
                10-Day Forecast (Wunderground API):
            </h3>
            @foreach($data['forecast'] as $forecast)
                @foreach($forecast['forecastday'] as $key => $value)
                    <h4>
                        <img src="{{ $value['icon_url'] }}" alt="Forecast Icon"><br>
                        Date: {{ $value['title'] or 'Extra Row, Please Ignore' }}<br>
                        Forecast: {{ $value['fcttext'] or 'Extra Row, Please Ignore' }}<br>
                        Chance of Rain: {{ $value['pop'] }}%<br>
                    </h4>
                @endforeach
            @endforeach

        </div>
    </section>
@stop

@section('body')
    <script src="/js/project/show.js"></script>
@stop
