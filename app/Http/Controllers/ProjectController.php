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
        foreach($project_array as $key => $value)
        {
            $forecast_url = 'http://api.wunderground.com/api/'.env('WU_KEY').'/forecast10day/q/'.$value->zipcode.'.json';
            # $map_url = 'https://www.google.com/maps/place/Oakland,+CA+'.$value->zipcode;
        }

        # Wunderground API response and JSON encoding
        $response = file_get_contents($forecast_url);
        $data = json_decode($response, true);

        # Try/catch block for local connection errors
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

        # Geocoder API response for Google Maps integration
        $curl     = new \Ivory\HttpAdapter\CurlHttpAdapter();
        $geocoder = new \Geocoder\Provider\GoogleMaps($curl);
        $geocoder_results = $geocoder->geocode('Oakland, CA');
        $geocoder_array = $geocoder_results->first();
        $coordinates_array = $geocoder_array->getCoordinates();

        # dd($coordinates_array);

        foreach($coordinates_array as $key => $value)
        {
            # echo($value);
            $map_url = "http://maps.google.com/maps/api/staticmap?size=600x400&sensor=false&zoom=10&markers=$value->latitutde%2C$value->longitude";
        }

        return view('projects.show')->with([
            'project' => $project,
            'data' => $data,
            'map_url' => $map_url
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
            'zipcode'
        );
        $data = array_values($data);

        \DB::table('projects')->insertGetId([
            'user_id' => \Auth::user()->id,
            'name' => $data[1],
            'description' => $data[2],
            'address' => $data[3],
            'city' => $data[4],
            'state' => $data[5],
            'zipcode' => $data[6],
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
        ]);

        $data = $request->only(
            'user_id',
            'id',
            'name',
            'description',
            'address',
            'city',
            'state',
            'zipcode'
            # 'latitude',
            # 'longitude',
            # 'active',

            # 'tracking_number',
            # 'cost_center',
            # 'project_phase',
            # 'wdid_number',
            # 'cgp_number',
            # 'risk_level',

            # 'owner_company_name',
            # 'owner_company_description',
            # 'owner_company_zipcode',
            # 'owner_company_address',
            # 'owner_company_city',
            # 'owner_company_state',
            # 'owner_representative',
            # 'owner_title',
            # 'owner_phone',
            # 'owner_email',

            # 'contractor_company_name',
            # 'contractor_company_description',
            # 'contractor_company_zipcode',
            # 'contractor_company_address',
            # 'contractor_company_city',
            # 'contractor_company_state',
            # 'contractor_representative',
            # 'contractor_title',
            # 'contractor_phone',
            # 'contractor_email',

            # 'wpcm_company_name',
            # 'wpcm_company_description',
            # 'wpcm_company_zipcode',
            # 'wpcm_company_address',
            # 'wpcm_company_city',
            # 'wpcm_company_state',
            # 'wpcm_representative',
            # 'wpcm_title',
            # 'wpcm_phone',
            # 'wpcm_email',

            # 'qsp_company_name',
            # 'qsp_company_description',
            # 'qsp_company_zipcode',
            # 'qsp_company_address',
            # 'qsp_company_city',
            # 'qsp_company_state',
            # 'qsp_representative',
            # 'qsp_title',
            # 'qsp_phone',
            # 'qsp_email',
        );

        $data = array_values($data);

        \DB::table('projects')->where('id', '=', $data[1])->update([
            # 'user_id' => \Auth::user()->id,
            'name' => $data[2],
            'description' => $data[3],
            'address' => $data[4],
            'city' => $data[5],
            'state' => $data[6],
            'zipcode' => $data[7],
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
            'id',
            'name',
            'description',
            'address',
            'city',
            'state',
            'zipcode'
        );
        $data = array_values($data);

        /*
        \DB::table('projects')
            ->where('user_id', '=', $data[0])
            ->where('id', '=', $data[1])
            ->delete();

            $project = \App\Project::find($data[1]);
            $project.delete();

        \DB::table('projects')->where('id', '=', $data[1])->delete([
            'user_id' => $data[0],
            'id' => $data[1],
            'name' => $data[2],
            'description' => $data[3],
            'address' => $data[4],
            'city' => $data[5],
            'state' => $data[6],
            'zipcode' => $data[7],
        ]);
        */

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
        # dd(array_sum($project_count));
        # dd(array_sum($inspection_count));

        return view('projects.chart')->with([
            'project_count' => $project_count,
            'inspection_count' => $inspection_count
        ]);
    }
}
