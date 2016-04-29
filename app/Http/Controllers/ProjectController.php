<?php

namespace StormSafe\Http\Controllers;

use Illuminate\Http\Request;

use StormSafe\Http\Requests;

class InspectionController extends Controller
{
    function getIndex() {
        # $inspections = \App\Inspection::all();
        $inspections = \DB::table('inspections')->with('project_id')->get();
        dd($inspections);

        /*
        $projects_list = [];
        foreach($inspections as $inspection){
            dd($inspection->project_id);
        }
        return view('inspections.index')->with('inspections', $inspections);
        */
    }

    /*
    public function index(Project $project)
    {
        return view('tasks.index',view compact('project'));
    }
     */

    public function getShow($name = null) {
        return view('inspections.show')->with('name',$name);
    }

    public function getCreate() {
        return view('inspections.create');
    }

    public function postCreate(Request $request) {
        $this->validate($request,[
            # 'title' => 'required|min:3',
            # 'author' => 'required',
            # 'published' => 'required|min:4',
            # 'cover' => 'required|url',
            # 'purchase_link' => 'required|url',

            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            # 'zipcode' => 'required',
            # 'latitude' => 'required',
            'longitude' => 'required',
            'active' => 'required',

            'tracking_number' => 'required',
            'cost_center' => 'required',
            'project_phase' => 'required',
            'wdid_number' => 'required',
            'cgp_number' => 'required',
            'risk_level' => 'required',
        ]);

        $data = $request->only(
            # 'title','author','published','cover','purchase_link'
        );

        # \App\Project::create($data);
        DB::table('projects')->insertGetId(
          array(
            'name' => 'name',
            'description' => 'description'
          )
        );

        \Session::flash('message','Your project was added');
        return redirect('/projects');
    }

    public function getEdit($id) {
        # $project = \App\Project::find($request->id);
        $project = DB::table('projects')->where('id', '=', $request->id)->get();

        return view('projects.edit')->with('name',$name);
    }

    public function postEdit(Request $request) {
        # $project = \App\Project::find($request->id);
        $project = DB::table('projects')->where('id', '=', $request->id)->get();

        # $book->title = $request->title;
        # $book->author_id = $request->author_id;
        # $book->cover = $request->cover;
        # $book->published = $request->published;
        # $book->purchase_link = $request->purchase_link;

        $project->name = $request->name;
        $project->description = $request->description;
        $project->address = $request->address;
        $project->city = $request->city;
        $project->state = $request->state;

        $project->zipcode = $request->zipcode;
        $project->latitude = $request->latitude;
        $project->longitude = $request->longitude;
        $project->active = $request->active;

        $project->tracking_number = $request->tracking_number;
        $project->cost_center = $request->cost_center;
        $project->project_phase = $request->project_phase;
        $project->wdid_number = $request->wdid_number;
        $project->cgp_number = $request->cgp_number;
        $project->risk_level = $request->risk_level;

        $project->owner_company_name = $request->owner_company_name;
        $project->owner_company_description = $request->owner_company_description;
        $project->owner_company_zipcode = $request->owner_company_zipcode;
        $project->owner_company_address = $request->owner_company_address;
        $project->owner_company_city = $request->owner_company_city;
        $project->owner_company_state = $request->owner_company_state;

        $project->owner_representative = $request->owner_representative;
        $project->owner_title = $request->owner_title;
        $project->owner_phone = $request->owner_phone;
        $project->owner_email = $request->owner_email;

        $project->contractor_company_name = $request->contractor_company_name;
        $project->contractor_company_description = $request->contractor_company_description;
        $project->contractor_company_zipcode = $request->contractor_company_zipcode;
        $project->contractor_company_address = $request->contractor_company_address;
        $project->contractor_company_city = $request->contractor_company_city;
        $project->contractor_company_state = $request->contractor_company_state;

        $project->contractor_representative = $request->contractor_representative;
        $project->contractor_title = $request->contractor_title;
        $project->contractor_phone = $request->contractor_phone;
        $project->contractor_email = $request->contractor_email;

        $project->wpcm_company_name = $request->wpcm_company_name;
        $project->wpcm_company_description = $request->wpcm_company_description;
        $project->wpcm_company_zipcode = $request->wpcm_company_zipcode;
        $project->wpcm_company_address = $request->wpcm_company_address;
        $project->wpcm_company_city = $request->wpcm_company_city;
        $project->wpcm_company_state = $request->wpcm_company_state;

        $project->wpcm_representative = $request->wpcm_representative;
        $project->wpcm_title = $request->wpcm_title;
        $project->wpcm_phone = $request->wpcm_phone;
        $project->wpcm_email = $request->wpcm_email;

        $project->qsp_company_name = $request->qsp_company_name;
        $project->qsp_company_description = $request->qsp_company_description;
        $project->qsp_company_zipcode = $request->qsp_company_zipcode;
        $project->qsp_company_address = $request->qsp_company_address;
        $project->qsp_company_city = $request->qsp_company_city;
        $project->qsp_company_state = $request->qsp_company_state;

        $project->qsp_representative = $request->qsp_representative;
        $project->qsp_title = $request->qsp_title;
        $project->qsp_phone = $request->qsp_phone;
        $project->qsp_email = $request->qsp_email;

        $project->save();

        \Session::flash('message','Your changes were saved.');
        return redirect('/project/edit/'.$request->id);
    }

    public function getConfirmDelete($id) {
        # $project = \App\Project::find($id);
        $project = DB::table('projects')->where('id', '=', $request->id)->get();

        return view('projects.delete')->with('project', $project);
    }

    public function getGoDelete($id) {
        # $project = \App\Project::find($id);
        $project = DB::table('projects')->where('id', '=', $request->id)->get();

        if(is_null($project)) {
            \Session::flash('flash_message','project not found.');
            return redirect('/projects');
        }

        $project->delete();
        \Session::flash('flash_message','project was deleted.');
        return redirect('/projects');
    }
}
