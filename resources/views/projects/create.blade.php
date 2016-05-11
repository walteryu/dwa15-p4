@extends('layouts.master')

@section('title')
    StormSafe | Create Project
@stop

@section('head')
    <link href='/css/project.css' rel='stylesheet'>
@stop

@section('content')

    <h1>Create Project</h1>

    <form method='POST' action='/project/create'>

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    {{ csrf_field() }}

                    <div class='form-group'>
                       <label>Name:</label>
                        <input
                            type='text'
                            id='name'
                            name='name'
                            value='{{ old('name', 'e.g. Oakland Airport') }}'
                        >
                       <div class='error'>{{ $errors->first('name') }}</div>
                    </div>

                    <div class='form-group'>
                       <label>Description:</label>
                       <input
                           type='text'
                           id='description'
                           name='description'
                           value='{{ old('description', 'e.g. Runway Improvement') }}'
                       >
                       <div class='error'>{{ $errors->first('description') }}</div>
                    </div>

                    <div class='form-group'>
                       <label>Street Address:</label>
                       <input
                           type='text'
                           id='address'
                           name='address'
                           value='{{ old('address', 'e.g. 1 Airport Drive') }}'
                       >
                       <div class='error'>{{ $errors->first('address') }}</div>
                    </div>

                    <div class='form-group'>
                       <label>City:</label>
                       <input
                           type='text'
                           id='city'
                           name='city'
                           value='{{ old('city', 'e.g. Oakland') }}'
                       >
                       <div class='error'>{{ $errors->first('city') }}</div>
                    </div>

                    <div class='form-group'>
                       <label>State (Please enter 2-letter abbreviation, e.g. CA):</label>
                       <input
                           type='text'
                           id='state'
                           name='state'
                           value='{{ old('state', 'e.g. CA') }}'
                       >
                       <div class='error'>{{ $errors->first('state') }}</div>
                    </div>

                    <div class='form-group'>
                       <label>Zipcode:</label>
                       <input
                           type='text'
                           id='zipcode'
                           name='zipcode'
                           value='{{ old('zipcode', 'e.g. 94621') }}'
                       >
                       <div class='error'>{{ $errors->first('zipcode') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>latitude (Please enter numeric value):</label>
                        <input
                             type='number'
                             id='latitude'
                             name='latitude'
                             value='{{ old('latitude') }}'
                        >
                        <div class='error'>{{ $errors->first('latitude') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>longitude (Please enter numeric value):</label>
                        <input
                             type='number'
                             id='longitude'
                             name='longitude'
                             value='{{ old('longitude') }}'
                        >
                        <div class='error'>{{ $errors->first('longitude') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>active:</label>
                        <input
                             type='checkbox'
                             id='active'
                             name='active'
                             value='{{ old('active') }}'
                        >
                        <div class='error'>{{ $errors->first('active') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>tracking_number:</label>
                        <input
                             type='text'
                             id='tracking_number'
                             name='tracking_number'
                             value='{{ old('tracking_number') }}'
                        >
                        <div class='error'>{{ $errors->first('tracking_number') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>cost_center:</label>
                        <input
                             type='text'
                             id='cost_center'
                             name='cost_center'
                             value='{{ old('cost_center') }}'
                        >
                        <div class='error'>{{ $errors->first('cost_center') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>project_phase:</label>
                        <input
                             type='text'
                             id='project_phase'
                             name='project_phase'
                             value='{{ old('project_phase') }}'
                        >
                        <div class='error'>{{ $errors->first('project_phase') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>wdid_number:</label>
                        <input
                             type='text'
                             id='wdid_number'
                             name='wdid_number'
                             value='{{ old('wdid_number') }}'
                        >
                        <div class='error'>{{ $errors->first('wdid_number') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>cgp_number:</label>
                        <input
                             type='text'
                             id='cgp_number'
                             name='cgp_number'
                             value='{{ old('cgp_number') }}'
                        >
                        <div class='error'>{{ $errors->first('cgp_number') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>risk_level:</label>
                        <input
                             type='number'
                             id='risk_level'
                             name='risk_level'
                             value='{{ old('risk_level') }}'
                        >
                        <div class='error'>{{ $errors->first('risk_level') }}</div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class='form-group'>
                        <label>owner_company_name:</label>
                        <input
                             type='text'
                             id='owner_company_name'
                             name='owner_company_name'
                             value='{{ old('owner_company_name') }}'
                        >
                        <div class='error'>{{ $errors->first('owner_company_name') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>owner_company_description:</label>
                        <input
                             type='text'
                             id='owner_company_description'
                             name='owner_company_description'
                             value='{{ old('owner_company_description') }}'
                        >
                        <div class='error'>{{ $errors->first('owner_company_description') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>owner_company_zipcode (Please enter 5-digit zipcode, e.g. 94621):</label>
                        <input
                             type='number'
                             id='owner_company_zipcode'
                             name='owner_company_zipcode'
                             value='{{ old('owner_company_zipcode') }}'
                        >
                        <div class='error'>{{ $errors->first('owner_company_zipcode') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>owner_company_address:</label>
                        <input
                             type='text'
                             id='owner_company_address'
                             name='owner_company_address'
                             value='{{ old('owner_company_address') }}'
                        >
                        <div class='error'>{{ $errors->first('owner_company_address') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>owner_company_city:</label>
                        <input
                             type='text'
                             id='owner_company_city'
                             name='owner_company_city'
                             value='{{ old('owner_company_city') }}'
                        >
                        <div class='error'>{{ $errors->first('owner_company_city') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>owner_company_state (Please enter 2-letter abbreviation, e.g. CA):</label>
                        <input
                             type='text'
                             id='owner_company_state'
                             name='owner_company_state'
                             value='{{ old('owner_company_state') }}'
                        >
                        <div class='error'>{{ $errors->first('owner_company_state') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>owner_representative:</label>
                        <input
                             type='text'
                             id='owner_representative'
                             name='owner_representative'
                             value='{{ old('owner_representative') }}'
                        >
                        <div class='error'>{{ $errors->first('owner_representative') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>owner_title:</label>
                        <input
                             type='text'
                             id='owner_title'
                             name='owner_title'
                             value='{{ old('owner_title') }}'
                        >
                        <div class='error'>{{ $errors->first('owner_title') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>owner_phone:</label>
                        <input
                             type='text'
                             id='owner_phone'
                             name='owner_phone'
                             value='{{ old('owner_phone') }}'
                        >
                        <div class='error'>{{ $errors->first('owner_phone') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>owner_email:</label>
                        <input
                             type='text'
                             id='owner_email'
                             name='owner_email'
                             value='{{ old('owner_email') }}'
                        >
                        <div class='error'>{{ $errors->first('owner_email') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>contractor_company_name:</label>
                        <input
                             type='text'
                             id='contractor_company_name'
                             name='contractor_company_name'
                             value='{{ old('contractor_company_name') }}'
                        >
                        <div class='error'>{{ $errors->first('contractor_company_name') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>contractor_company_description:</label>
                        <input
                             type='text'
                             id='contractor_company_description'
                             name='contractor_company_description'
                             value='{{ old('contractor_company_description') }}'
                        >
                        <div class='error'>{{ $errors->first('contractor_company_description') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>contractor_company_zipcode (Please enter 5-digit zipcode, e.g. 94621):</label>
                        <input
                             type='number'
                             id='contractor_company_zipcode'
                             name='contractor_company_zipcode'
                             value='{{ old('contractor_company_zipcode') }}'
                        >
                        <div class='error'>{{ $errors->first('contractor_company_zipcode') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>contractor_company_address:</label>
                        <input
                             type='text'
                             id='contractor_company_address'
                             name='contractor_company_address'
                             value='{{ old('contractor_company_address') }}'
                        >
                        <div class='error'>{{ $errors->first('contractor_company_address') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>contractor_company_city:</label>
                        <input
                             type='text'
                             id='contractor_company_city'
                             name='contractor_company_city'
                             value='{{ old('contractor_company_city') }}'
                        >
                        <div class='error'>{{ $errors->first('contractor_company_city') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>contractor_company_state (Please enter 2-letter abbreviation, e.g. CA):</label>
                        <input
                             type='text'
                             id='contractor_company_state'
                             name='contractor_company_state'
                             value='{{ old('contractor_company_state') }}'
                        >
                        <div class='error'>{{ $errors->first('contractor_company_state') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>contractor_representative:</label>
                        <input
                             type='text'
                             id='contractor_representative'
                             name='contractor_representative'
                             value='{{ old('contractor_representative') }}'
                        >
                        <div class='error'>{{ $errors->first('contractor_representative') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>contractor_title:</label>
                        <input
                             type='text'
                             id='contractor_title'
                             name='contractor_title'
                             value='{{ old('contractor_title') }}'
                        >
                        <div class='error'>{{ $errors->first('contractor_title') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>contractor_phone:</label>
                        <input
                             type='text'
                             id='contractor_phone'
                             name='contractor_phone'
                             value='{{ old('contractor_phone') }}'
                        >
                        <div class='error'>{{ $errors->first('contractor_phone') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>contractor_email:</label>
                        <input
                             type='text'
                             id='contractor_email'
                             name='contractor_email'
                             value='{{ old('contractor_email') }}'
                        >
                        <div class='error'>{{ $errors->first('contractor_email') }}</div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class='form-group'>
                        <label>wpcm_company_name:</label>
                        <input
                             type='text'
                             id='wpcm_company_name'
                             name='wpcm_company_name'
                             value='{{ old('wpcm_company_name') }}'
                        >
                        <div class='error'>{{ $errors->first('wpcm_company_name') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>wpcm_company_description:</label>
                        <input
                             type='text'
                             id='wpcm_company_description'
                             name='wpcm_company_description'
                             value='{{ old('wpcm_company_description') }}'
                        >
                        <div class='error'>{{ $errors->first('wpcm_company_description') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>wpcm_company_zipcode (Please enter 5-digit zipcode, e.g. 94621):</label>
                        <input
                             type='number'
                             id='wpcm_company_zipcode'
                             name='wpcm_company_zipcode'
                             value='{{ old('wpcm_company_zipcode') }}'
                        >
                        <div class='error'>{{ $errors->first('wpcm_company_zipcode') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>wpcm_company_address:</label>
                        <input
                             type='text'
                             id='wpcm_company_address'
                             name='wpcm_company_address'
                             value='{{ old('wpcm_company_address') }}'
                        >
                        <div class='error'>{{ $errors->first('wpcm_company_address') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>wpcm_company_city:</label>
                        <input
                             type='text'
                             id='wpcm_company_city'
                             name='wpcm_company_city'
                             value='{{ old('wpcm_company_city') }}'
                        >
                        <div class='error'>{{ $errors->first('wpcm_company_city') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>wpcm_company_state (Please enter 2-letter abbreviation, e.g. CA):</label>
                        <input
                             type='text'
                             id='wpcm_company_state'
                             name='wpcm_company_state'
                             value='{{ old('wpcm_company_state') }}'
                        >
                        <div class='error'>{{ $errors->first('wpcm_company_state') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>wpcm_representative:</label>
                        <input
                             type='text'
                             id='wpcm_representative'
                             name='wpcm_representative'
                             value='{{ old('wpcm_representative') }}'
                        >
                        <div class='error'>{{ $errors->first('wpcm_representative') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>wpcm_title:</label>
                        <input
                             type='text'
                             id='wpcm_title'
                             name='wpcm_title'
                             value='{{ old('wpcm_title') }}'
                        >
                        <div class='error'>{{ $errors->first('wpcm_title') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>wpcm_phone:</label>
                        <input
                             type='text'
                             id='wpcm_phone'
                             name='wpcm_phone'
                             value='{{ old('wpcm_phone') }}'
                        >
                        <div class='error'>{{ $errors->first('wpcm_phone') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>wpcm_email:</label>
                        <input
                             type='text'
                             id='wpcm_email'
                             name='wpcm_email'
                             value='{{ old('wpcm_email') }}'
                        >
                        <div class='error'>{{ $errors->first('wpcm_email') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>qsp_company_name:</label>
                        <input
                             type='text'
                             id='qsp_company_name'
                             name='qsp_company_name'
                             value='{{ old('qsp_company_name') }}'
                        >
                        <div class='error'>{{ $errors->first('qsp_company_name') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>qsp_company_description:</label>
                        <input
                             type='text'
                             id='qsp_company_description'
                             name='qsp_company_description'
                             value='{{ old('qsp_company_description') }}'
                        >
                        <div class='error'>{{ $errors->first('qsp_company_description') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>qsp_company_zipcode (Please enter 5-digit zipcode, e.g. 94621):</label>
                        <input
                             type='number'
                             id='qsp_company_zipcode'
                             name='qsp_company_zipcode'
                             value='{{ old('qsp_company_zipcode') }}'
                        >
                        <div class='error'>{{ $errors->first('qsp_company_zipcode') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>qsp_company_address:</label>
                        <input
                             type='text'
                             id='qsp_company_address'
                             name='qsp_company_address'
                             value='{{ old('qsp_company_address') }}'
                        >
                        <div class='error'>{{ $errors->first('qsp_company_address') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>qsp_company_city:</label>
                        <input
                             type='text'
                             id='qsp_company_city'
                             name='qsp_company_city'
                             value='{{ old('qsp_company_city') }}'
                        >
                        <div class='error'>{{ $errors->first('qsp_company_city') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>qsp_company_state (Please enter 2-letter abbreviation, e.g. CA):</label>
                        <input
                             type='text'
                             id='qsp_company_state'
                             name='qsp_company_state'
                             value='{{ old('qsp_company_state') }}'
                        >
                        <div class='error'>{{ $errors->first('qsp_company_state') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>qsp_representative:</label>
                        <input
                             type='text'
                             id='qsp_representative'
                             name='qsp_representative'
                             value='{{ old('qsp_representative') }}'
                        >
                        <div class='error'>{{ $errors->first('qsp_representative') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>qsp_title:</label>
                        <input
                             type='text'
                             id='qsp_title'
                             name='qsp_title'
                             value='{{ old('qsp_title') }}'
                        >
                        <div class='error'>{{ $errors->first('qsp_title') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>qsp_phone:</label>
                        <input
                             type='text'
                             id='qsp_phone'
                             name='qsp_phone'
                             value='{{ old('qsp_phone') }}'
                        >
                        <div class='error'>{{ $errors->first('qsp_phone') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>qsp_email:</label>
                        <input
                             type='text'
                             id='qsp_email'
                             name='qsp_email'
                             value='{{ old('qsp_email') }}'
                        >
                        <div class='error'>{{ $errors->first('qsp_email') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class='form-instructions'>
            All fields are required
        </div>

        <button type="submit" class="btn btn-primary">Create Project</button>

        {{--
        <ul class=''>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        --}}

        <div class='error'>
            @if(count($errors) > 0)
                Please correct the errors above and try again.
            @endif
        </div>

    </form>

@stop
