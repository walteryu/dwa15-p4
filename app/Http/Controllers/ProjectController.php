<?php

namespace StormSafe\Http\Controllers;

use Illuminate\Http\Request;
use StormSafe\Http\Requests;

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

        return view('projects.show')->with('project',$project);
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
        ], $messages);

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

        \Session::flash('message','Your project was added.');
        return redirect('/projects');
    }

    public function getEdit($id) {
        $project = \DB::table('projects')->where('id', '=', $id)->get();

        if(is_null($project)) {
            \Session::flash('message','Project not found.');
            return redirect('/projects');
        }

        if($project->user_id != \Auth::id()) {
            \Session::flash(
              'message','Sorry, project does not belong to your account.'
            );
            return redirect('/projects');
        }

        # $projects_menu = \App\Author::authorsForDropdown();

        return view('projects.edit')
            ->with('project',$project);
            # ->with('project_inspections',$project_inspections);
    }

    public function postEdit(Request $request) {
        /*
        $messages = [
            'not_in' => 'Please select project for your inspection.',
        ];
        */

        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            # 'inspection_id' => 'not_in:0'
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

        \Session::flash('message','Your project was updated.');
        return redirect('/projects');
    }

    public function getDelete($id) {
        $project = \DB::table('projects')->where('id', '=', $id)->get();
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

        \Session::flash('flash_message','Project was deleted.');
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

        # Do the search with the provided search term ($request->search)
        $projects = \App\Project::where('title','LIKE','%'.$request->search.'%')->get();

        return view('projects.search-ajax')->with(
            ['projects' => $projects]
        );
    }
}
