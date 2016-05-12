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
                    {{ $value->address }}
                </h3>
                <h3>
                    City:&nbsp;
                    {{ $value->city }}
                </h3>
                <h3>
                    State:&nbsp;
                    {{ $value->state }}
                </h3>
                <h3>
                    Zipcode:&nbsp;
                    {{ $value->zipcode }}
                </h3>

                <h3 class='form-group'>
                    latitude:
                    {{ $value->latitude }}
                </h3>

                <h3 class='form-group'>
                    longitude:
                    {{ $value->longitude }}
                </h3>

                <h3 class='form-group'>
                    active:
                    {{ $value->active }}
                </h3>

                <h3 class='form-group'>
                    tracking_number:
                    {{ $value->tracking_number }}
                </h3>

                <h3 class='form-group'>
                    cost_center:
                    {{ $value->cost_center }}
                </h3>

                <h3 class='form-group'>
                    project_phase:
                    {{ $value->project_phase }}
                </h3>

                <h3 class='form-group'>
                    wdid_number:
                    {{ $value->wdid_number }}
                </h3>

                <h3 class='form-group'>
                    cgp_number:
                    {{ $value->cgp_number }}
                </h3>

                <h3 class='form-group'>
                    risk_level:
                    {{ $value->risk_level }}
                </h3>

                <h3 class='form-group'>
                    owner_company_name:
                    {{ $value->owner_company_name }}
                </h3>

                <h3 class='form-group'>
                    owner_company_description:
                    {{ $value->owner_company_description }}
                </h3>

                <h3 class='form-group'>
                    owner_company_zipcode:
                    {{ $value->owner_company_zipcode }}
                </h3>

                <h3 class='form-group'>
                    owner_company_address:
                    {{ $value->owner_company_address }}
                </h3>

                <h3 class='form-group'>
                    owner_company_city:
                    {{ $value->owner_company_city }}
                </h3>

                <h3 class='form-group'>
                    owner_company_state:
                    {{ $value->owner_company_state }}
                </h3>

                <h3 class='form-group'>
                    owner_representative:
                    {{ $value->owner_representative }}
                </h3>

                <h3 class='form-group'>
                    owner_title:
                    {{ $value->owner_title }}
                </h3>

                <h3 class='form-group'>
                    owner_phone:
                    {{ $value->owner_phone }}
                </h3>

                <h3 class='form-group'>
                    owner_email:
                    {{ $value->owner_email }}
                </h3>

                <h3 class='form-group'>
                    contractor_company_name:
                    {{ $value->contractor_company_name }}
                </h3>

                <h3 class='form-group'>
                    contractor_company_description:
                    {{ $value->contractor_company_description }}
                </h3>

                <h3 class='form-group'>
                    contractor_company_zipcode:
                    {{ $value->contractor_company_zipcode }}
                </h3>

                <h3 class='form-group'>
                    contractor_company_address:
                    {{ $value->contractor_company_address }}
                </h3>

                <h3 class='form-group'>
                    contractor_company_city:
                    {{ $value->contractor_company_city }}
                </h3>

                <h3 class='form-group'>
                    contractor_company_state:
                    {{ $value->contractor_company_state }}
                </h3>

                <h3 class='form-group'>
                    contractor_representative:
                    {{ $value->contractor_representative }}
                </h3>

                <h3 class='form-group'>
                    contractor_title:
                    {{ $value->contractor_title }}
                </h3>

                <h3 class='form-group'>
                    contractor_phone:
                    {{ $value->contractor_phone }}
                </h3>

                <h3 class='form-group'>
                    contractor_email:
                    {{ $value->contractor_email }}
                </h3>

                <h3 class='form-group'>
                    wpcm_company_name:
                    {{ $value->wpcm_company_name }}
                </h3>

                <h3 class='form-group'>
                    wpcm_company_description:
                    {{ $value->wpcm_company_description }}
                </h3>

                <h3 class='form-group'>
                    wpcm_company_zipcode:
                    {{ $value->wpcm_company_zipcode }}
                </h3>

                <h3 class='form-group'>
                    wpcm_company_address:
                    {{ $value->wpcm_company_address }}
                </h3>

                <h3 class='form-group'>
                    wpcm_company_city:
                    {{ $value->wpcm_company_city }}
                </h3>

                <h3 class='form-group'>
                    wpcm_company_state:
                    {{ $value->wpcm_company_state }}
                </h3>

                <h3 class='form-group'>
                    wpcm_representative:
                    {{ $value->wpcm_representative }}
                </h3>

                <h3 class='form-group'>
                    wpcm_title:
                    {{ $value->wpcm_title }}
                </h3>

                <h3 class='form-group'>
                    wpcm_phone:
                    {{ $value->wpcm_phone }}
                </h3>

                <h3 class='form-group'>
                    wpcm_email:
                    {{ $value->wpcm_email }}
                </h3>

                <h3 class='form-group'>
                    qsp_company_name:
                    {{ $value->qsp_company_name }}
                </h3>

                <h3 class='form-group'>
                    qsp_company_description:
                    {{ $value->qsp_company_description }}
                </h3>

                <h3 class='form-group'>
                    qsp_company_zipcode:
                    {{ $value->qsp_company_zipcode }}
                </h3>

                <h3 class='form-group'>
                    qsp_company_address:
                    {{ $value->qsp_company_address }}
                </h3>

                <h3 class='form-group'>
                    qsp_company_city:
                    {{ $value->qsp_company_city }}
                </h3>

                <h3 class='form-group'>
                    qsp_company_state:
                    {{ $value->qsp_company_state }}
                </h3>

                <h3 class='form-group'>
                    qsp_representative:
                    {{ $value->qsp_representative }}
                </h3>

                <h3 class='form-group'>
                    qsp_title:
                    {{ $value->qsp_title }}
                </h3>

                <h3 class='form-group'>
                    qsp_phone:
                    {{ $value->qsp_phone }}
                </h3>

                <h3 class='form-group'>
                    qsp_email:
                    {{ $value->qsp_email }}
                </h3>
            @endforeach

            <!--
              <h3>
                  Site Map (Bonus Feature):
              </h3>
              <img src="http://bit.ly/24KvUoa" alt="Site Map"><br>
            -->

            <h3>
                10-Day Forecast (Wunderground API):
            </h3>
            {{ dd($data['forecast']) }}
            @foreach($data['forecast'] as $forecast)
                @foreach($forecast['forecastday'] as $key => $value)
                    <h4>
                        <img src="{{ $value['icon_url'] }}" alt="Forecast Icon"><br>
                        Date: {{ $value['title'] or 'API returns uneven array, please ignore.' }}<br>
                        Forecast: {{ $value['fcttext'] or 'API returns uneven array, please ignore.' }}<br>
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
