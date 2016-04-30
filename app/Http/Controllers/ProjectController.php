<?php

namespace StormSafe\Http\Controllers;

use Illuminate\Http\Request;
use StormSafe\Http\Requests;

class ProjectController extends Controller
{
    function getIndex() {
        $projects = \DB::table('projects')->get();
        return view('projects.index')->with('projects', $projects);
    }

    public function getCreate() {
        return view('projects.create');
    }

    public function postCreate(Request $request) {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            # 'address' => 'required',
            # 'city' => 'required',
            # 'state' => 'required',
            # 'zipcode' => 'required',
            # 'latitude' => 'required',
            # 'longitude' => 'required',
            # 'active' => 'required',

            # 'tracking_number' => 'required',
            # 'cost_center' => 'required',
            # 'project_phase' => 'required',
            # 'wdid_number' => 'required',
            # 'cgp_number' => 'required',
            # 'risk_level' => 'required',
        ]);

        $data = $request->only(
            # 'title','author','published','cover','purchase_link'
            'name', 'description', 'user_id'
        );

        # \App\Project::create($data);
        \DB::table('projects')->insertGetId(
            array(
                'name' => 'name',
                'description' => 'description',
                'user_id' => \Auth::user()->id,
            )
        );

        \Session::flash('message','Your project was added.');
        return redirect('/projects');
    }

    public function getEdit($id) {
        # $project = \DB::table('projects')->where('id', '=', $request->id)->get();
        $project = \DB::table('projects')->where('id', '=', $id)->get();
        return view('projects.edit')->with('project',$project);
    }

    public function postEdit(Request $request) {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            # 'address' => 'required',
            # 'city' => 'required',
            # 'state' => 'required',
            # 'zipcode' => 'required',
            # 'latitude' => 'required',
            # 'longitude' => 'required',
            # 'active' => 'required',

            # 'tracking_number' => 'required',
            # 'cost_center' => 'required',
            # 'project_phase' => 'required',
            # 'wdid_number' => 'required',
            # 'cgp_number' => 'required',
            # 'risk_level' => 'required',
        ]);

        # $project->name = $request->name;
        # $project->description = $request->description;
        # $project->address = $request->address;
        # $project->city = $request->city;
        # $project->state = $request->state;

        # $project->zipcode = $request->zipcode;
        # $project->latitude = $request->latitude;
        # $project->longitude = $request->longitude;
        # $project->active = $request->active;

        # $project->tracking_number = $request->tracking_number;
        # $project->cost_center = $request->cost_center;
        # $project->project_phase = $request->project_phase;
        # $project->wdid_number = $request->wdid_number;
        # $project->cgp_number = $request->cgp_number;
        # $project->risk_level = $request->risk_level;

        # $project->owner_company_name = $request->owner_company_name;
        # $project->owner_company_description = $request->owner_company_description;
        # $project->owner_company_zipcode = $request->owner_company_zipcode;
        # $project->owner_company_address = $request->owner_company_address;
        # $project->owner_company_city = $request->owner_company_city;
        # $project->owner_company_state = $request->owner_company_state;

        # $project->owner_representative = $request->owner_representative;
        # $project->owner_title = $request->owner_title;
        # $project->owner_phone = $request->owner_phone;
        # $project->owner_email = $request->owner_email;

        # $project->contractor_company_name = $request->contractor_company_name;
        # $project->contractor_company_description = $request->contractor_company_description;
        # $project->contractor_company_zipcode = $request->contractor_company_zipcode;
        # $project->contractor_company_address = $request->contractor_company_address;
        # $project->contractor_company_city = $request->contractor_company_city;
        # $project->contractor_company_state = $request->contractor_company_state;

        # $project->contractor_representative = $request->contractor_representative;
        # $project->contractor_title = $request->contractor_title;
        # $project->contractor_phone = $request->contractor_phone;
        # $project->contractor_email = $request->contractor_email;

        # $project->wpcm_company_name = $request->wpcm_company_name;
        # $project->wpcm_company_description = $request->wpcm_company_description;
        # $project->wpcm_company_zipcode = $request->wpcm_company_zipcode;
        # $project->wpcm_company_address = $request->wpcm_company_address;
        # $project->wpcm_company_city = $request->wpcm_company_city;
        # $project->wpcm_company_state = $request->wpcm_company_state;

        # $project->wpcm_representative = $request->wpcm_representative;
        # $project->wpcm_title = $request->wpcm_title;
        # $project->wpcm_phone = $request->wpcm_phone;
        # $project->wpcm_email = $request->wpcm_email;

        # $project->qsp_company_name = $request->qsp_company_name;
        # $project->qsp_company_description = $request->qsp_company_description;
        # $project->qsp_company_zipcode = $request->qsp_company_zipcode;
        # $project->qsp_company_address = $request->qsp_company_address;
        # $project->qsp_company_city = $request->qsp_company_city;
        # $project->qsp_company_state = $request->qsp_company_state;

        # $project->qsp_representative = $request->qsp_representative;
        # $project->qsp_title = $request->qsp_title;
        # $project->qsp_phone = $request->qsp_phone;
        # $project->qsp_email = $request->qsp_email;

        # $project->save();

        $data = $request->only(
            'name', 'description', 'user_id'
        );

        # \DB::table('projects')->where('id', '=', $request->id)->update([
        \DB::table('projects')->where('id', '=', $id)->update([
            'id' => $id,
            'name' => 'name',
            'description' => 'description',
            # 'user_id' => \Auth::user()->id,
        ]);


        \Session::flash('message','Your project was updated.');
        # return redirect('/projects/edit/{$id}');

        $project = \DB::table('projects')->where('id', '=', $id)->get();
        dd($project);
    }

    public function getShow($id) {
        $project = \DB::table('projects')->where('id', '=', $id)->get();
        foreach( $project as $key => $value )
        {
            echo $value->id;
        }
        # return view('projects.show')->with('project',$project);
    }

    public function getConfirmDelete($id) {
        $project = \DB::table('projects')->where('id', '=', $request->id)->get();

        return view('projects.delete')->with('project', $project);
    }

    public function getGoDelete($id) {
        $project = \DB::table('projects')->where('id', '=', $request->id)->get();

        if(is_null($project)) {
            \Session::flash('flash_message','project not found.');
            return redirect('/projects');
        }

        $project->delete();
        \Session::flash('flash_message','project was deleted.');
        return redirect('/projects');
    }
}
