<?php

namespace StormSafe\Http\Controllers;

use Illuminate\Http\Request;
use StormSafe\Http\Requests;

use Redis;
use StormSafe\Vendor\Geocoder;

class ProjectController extends Controller
{
    function getIndex() {
        $projects = \DB::table('projects')
            ->where('user_id', '=', \Auth::user()->id)
            ->get();

        return view('projects.index')->with('projects', $projects);
    }

    public function getShow($id) {
        $project = \DB::table('projects')->where('id', '=', $id)->get();

        if(is_null($project)) {
            \Session::flash(
                'message','Project not found, please try again.'
            );
            return redirect('/projects');
        }

        $project_array = array_values($project);

        # Bonus Feature, Wunderground API response and JSON encoding
        foreach($project_array as $key => $value)
        {
          $forecast_url = 'http://api.wunderground.com/api/'.env('WU_KEY').'/forecast10day/q/'.$value->zipcode.'.json';
        }

        $response = file_get_contents($forecast_url);
        $data = json_decode($response, true);

        # Bonus Feature, Redis caching (try/catch block for local connection errors)
        /*
        try
        {
            $redis = Redis::connection();
            $redis->set('set_array', $response);

            $redis    = Redis::connection();
            $get_array = $redis->get('set_array');
            $get_array = json_decode($get_array);
        }
        catch(\Exception $e)
        {
            \Session::flash('message','Redis Error: '.$e->getMessage());
        }
        */

        # Bonus Feature, Geocoder API response for Google Maps integration
        $curl     = new \Ivory\HttpAdapter\CurlHttpAdapter();
        $geocoder = new \Geocoder\Provider\GoogleMaps($curl);
        $geocoder_results = $geocoder->geocode('Oakland, CA');
        $geocoder_array = $geocoder_results->first();
        $coordinates_array = $geocoder_array->getCoordinates();

        # Bonus Feature, Google Map API URL:
        /*
        foreach($coordinates_array as $key => $value)
        {
            # $map_url = "http://maps.google.com/maps/api/staticmap?size=600x400&sensor=false&zoom=10&markers=#{@site.lat}%2C#{@site.long}"
            # $map_url = 'http://maps.google.com/maps/api/staticmap?size=600x400&sensor=false&zoom=10&markers='.$value->latitude.'%2C'.$value->longitude'
        }
        */

        return view('projects.show')->with([
            'project' => $project,
            'data' => $data
            #,
            # 'map_url' => $map_url
        ]);
    }

    public function getCreate() {
        return view('projects.create');
    }

    public function postCreate(Request $request) {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required'
        ]);

        $data = $request->only(
            'user_id',
            'name',
            'description',
            'address',
            'city',
            'state',
            'zipcode',

            'latitude',
            'longitude',
            'active',

            'tracking_number',
            'cost_center',
            'project_phase',
            'wdid_number',
            'cgp_number',
            'risk_level',

            'owner_company_name',
            'owner_company_description',
            'owner_company_zipcode',
            'owner_company_address',
            'owner_company_city',
            'owner_company_state',
            'owner_representative',
            'owner_title',
            'owner_phone',
            'owner_email',

            'contractor_company_name',
            'contractor_company_description',
            'contractor_company_zipcode',
            'contractor_company_address',
            'contractor_company_city',
            'contractor_company_state',
            'contractor_representative',
            'contractor_title',
            'contractor_phone',
            'contractor_email',

            'wpcm_company_name',
            'wpcm_company_description',
            'wpcm_company_zipcode',
            'wpcm_company_address',
            'wpcm_company_city',
            'wpcm_company_state',
            'wpcm_representative',
            'wpcm_title',
            'wpcm_phone',
            'wpcm_email',

            'qsp_company_name',
            'qsp_company_description',
            'qsp_company_zipcode',
            'qsp_company_address',
            'qsp_company_city',
            'qsp_company_state',
            'qsp_representative',
            'qsp_title',
            'qsp_phone',
            'qsp_email'
        );
        $data = array_values($data);

        # \App model namespacing issue, using Database Facade instead
        \DB::table('projects')->insertGetId([
            'user_id' => \Auth::user()->id,
            'name' => $data[1],
            'description' => $data[2],
            'address' => $data[3],
            'city' => $data[4],
            'state' => $data[5],
            'zipcode' => $data[6],

            'latitude' => $data[7],
            'longitude' => $data[8],
            'active' => $data[9],
            'tracking_number' => $data[10],
            'cost_center' => $data[11],
            'project_phase' => $data[12],
            'wdid_number' => $data[13],
            'cgp_number' => $data[14],
            'risk_level' => $data[15],
            'owner_company_name' => $data[16],
            'owner_company_description' => $data[17],
            'owner_company_zipcode' => $data[18],
            'owner_company_address' => $data[19],
            'owner_company_city' => $data[20],
            'owner_company_state' => $data[21],
            'owner_representative' => $data[22],
            'owner_title' => $data[23],
            'owner_phone' => $data[24],
            'owner_email' => $data[25],
            'contractor_company_name' => $data[26],
            'contractor_company_description' => $data[27],
            'contractor_company_zipcode' => $data[28],
            'contractor_company_address' => $data[29],
            'contractor_company_city' => $data[30],
            'contractor_company_state' => $data[31],
            'contractor_representative' => $data[32],
            'contractor_title' => $data[33],
            'contractor_phone' => $data[34],
            'contractor_email' => $data[35],
            'wpcm_company_name' => $data[36],
            'wpcm_company_description' => $data[37],
            'wpcm_company_zipcode' => $data[38],
            'wpcm_company_address' => $data[39],
            'wpcm_company_city' => $data[40],
            'wpcm_company_state' => $data[41],
            'wpcm_representative' => $data[42],
            'wpcm_title' => $data[43],
            'wpcm_phone' => $data[44],
            'wpcm_email' => $data[45],
            'qsp_company_name' => $data[46],
            'qsp_company_description' => $data[47],
            'qsp_company_zipcode' => $data[48],
            'qsp_company_address' => $data[49],
            'qsp_company_city' => $data[50],
            'qsp_company_state' => $data[51],
            'qsp_representative' => $data[52],
            'qsp_title' => $data[53],
            'qsp_phone' => $data[54],
            'qsp_email' => $data[55]
        ]);

        \Session::flash('message','Project created successfully!');
        return redirect('/projects');
    }

    public function getEdit($id) {
        $project = \DB::table('projects')->where('id', '=', $id)->get();

        if(is_null($project)) {
            \Session::flash('message','Project not found.');
            return redirect('/projects');
        }

        # if($project->user_id != \Auth::id()) {
        foreach( $project as $key => $value )
        {
            if($value->user_id != \Auth::id()) {
                \Session::flash(
                  'message','Sorry, project does not belong to your account.'
                );
                return redirect('/projects');
            }
        }
        return view('projects.edit')
            ->with('project',$project);
    }

    public function postEdit(Request $request) {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required'
            # str_random(10)
        ]);

        $data = $request->only(
            'user_id',
            'id',
            'name',
            'description',
            'address',
            'city',
            'state',
            'zipcode',

            'latitude',
            'longitude',
            'active',

            'tracking_number',
            'cost_center',
            'project_phase',
            'wdid_number',
            'cgp_number',
            'risk_level',

            'owner_company_name',
            'owner_company_description',
            'owner_company_zipcode',
            'owner_company_address',
            'owner_company_city',
            'owner_company_state',
            'owner_representative',
            'owner_title',
            'owner_phone',
            'owner_email',

            'contractor_company_name',
            'contractor_company_description',
            'contractor_company_zipcode',
            'contractor_company_address',
            'contractor_company_city',
            'contractor_company_state',
            'contractor_representative',
            'contractor_title',
            'contractor_phone',
            'contractor_email',

            'wpcm_company_name',
            'wpcm_company_description',
            'wpcm_company_zipcode',
            'wpcm_company_address',
            'wpcm_company_city',
            'wpcm_company_state',
            'wpcm_representative',
            'wpcm_title',
            'wpcm_phone',
            'wpcm_email',

            'qsp_company_name',
            'qsp_company_description',
            'qsp_company_zipcode',
            'qsp_company_address',
            'qsp_company_city',
            'qsp_company_state',
            'qsp_representative',
            'qsp_title',
            'qsp_phone',
            'qsp_email'
        );

        $data = array_values($data);

        # \App model namespacing issue, using Database Facade instead
        \DB::table('projects')->where('id', '=', $data[1])->update([
            # 'user_id' => \Auth::user()->id,
            'name' => $data[2],
            'description' => $data[3],
            'address' => $data[4],
            'city' => $data[5],
            'state' => $data[6],
            'zipcode' => $data[7],

            'latitude' => $data[8],
            'longitude' => $data[9],
            'active' => $data[10],

            'tracking_number' => $data[11],
            'cost_center' => $data[12],
            'project_phase' => $data[13],
            'wdid_number' => $data[14],
            'cgp_number' => $data[15],
            'risk_level' => $data[16],

            'owner_company_name' => $data[17],
            'owner_company_description' => $data[18],
            'owner_company_zipcode' => $data[19],
            'owner_company_address' => $data[20],
            'owner_company_city' => $data[21],
            'owner_company_state' => $data[22],
            'owner_representative' => $data[23],
            'owner_title' => $data[24],
            'owner_phone' => $data[25],
            'owner_email' => $data[26],

            'contractor_company_name' => $data[27],
            'contractor_company_description' => $data[28],
            'contractor_company_zipcode' => $data[29],
            'contractor_company_address' => $data[30],
            'contractor_company_city' => $data[31],
            'contractor_company_state' => $data[32],
            'contractor_representative' => $data[33],
            'contractor_title' => $data[34],
            'contractor_phone' => $data[35],
            'contractor_email' => $data[36],

            'wpcm_company_name' => $data[37],
            'wpcm_company_description' => $data[38],
            'wpcm_company_zipcode' => $data[39],
            'wpcm_company_address' => $data[40],
            'wpcm_company_city' => $data[41],
            'wpcm_company_state' => $data[42],
            'wpcm_representative' => $data[43],
            'wpcm_title' => $data[44],
            'wpcm_phone' => $data[45],
            'wpcm_email' => $data[46],

            'qsp_company_name' => $data[47],
            'qsp_company_description' => $data[48],
            'qsp_company_zipcode' => $data[49],
            'qsp_company_address' => $data[50],
            'qsp_company_city' => $data[51],
            'qsp_company_state' => $data[52],
            'qsp_representative' => $data[53],
            'qsp_title' => $data[54],
            'qsp_phone' => $data[55],
            'qsp_email' => $data[56]
        ]);

        \Session::flash('message','Project updated successfully!');
        return redirect('/projects');
    }

    public function getDelete($id) {
        $project = \DB::table('projects')->where('id', '=', $id)->get();

        if(is_null($project)) {
            \Session::flash('flash_message','Project not found, please try again.');
            return redirect('/projects');
        }

        return view('projects.delete')->with('project', $project);
    }

    public function postDelete(Request $request) {
        $data = $request->only(
            'user_id',
            'id'
        );
        $data = array_values($data);

        # Cascading delete of inspection, then project records
        \DB::table('inspections')->where('project_id', $data[1])->delete();
        \DB::table('projects')->where('id', $data[1])->delete();

        \Session::flash('flash_message','Project was deleted!');
        return redirect('/projects');
    }

    # Returns inspections for given project ID
    public function getInspections($id) {
        $inspections = \DB::table('inspections')
            ->where('project_id', '=', $id)
            ->get();

        return view('projects.inspections')->with('inspections', $inspections);
    }

    # Project search form
    public function getSearch() {
        return view('projects.search');
    }

    # Project search form
    public function postSearch(Request $request) {
        $data = $request->input();
        $data = array_values($data);

        $projects = \DB::table('projects')
            # ->where('title','LIKE','%'.$request->search.'%')->get();
            ->where('name','LIKE','%'.$data[1].'%')
            ->orWhere('description','LIKE','%'.$data[1].'%')
            ->get();

        return view('projects.search-ajax')->with(
            ['projects' => $projects]
        );
    }

    # Project chart page
    public function getChart() {
        $projects = \DB::table('projects')
            ->where('user_id', '=', \Auth::user()->id)
            ->get();
        $project_count[] = count($projects);

        $inspection_count = [];
        foreach($projects as $project)
        {
            $inspections = \DB::table('inspections')
                ->where('project_id', '=', $project->id)
                ->get();

            $inspection_count[] = count($inspections);
        }

        return view('projects.chart')->with([
            'project_count' => $project_count,
            'inspection_count' => $inspection_count
        ]);
    }

    # About page: Placed here to save an additional main/home controller
    public function getAbout() {
        return view('projects.about');
    }
}
