<?php

namespace StormSafe\Http\Controllers;

use Illuminate\Http\Request;
use StormSafe\Http\Requests;

class InspectionController extends Controller
{
    function getIndex() {
        $inspections = \DB::table('inspections')
            ->orderBy('created_at', '=', 'ASC')
            ->get();

        if(is_null($inspections)) {
            \Session::flash(
                'message','No inspections for project, please add them.'
            );
            return redirect('/projects');
        }

        return view('inspections.index')->with('inspections', $inspections);
    }

    public function getShow($id) {
        $inspection = \DB::table('inspections')->where('id', '=', $id)->get();

        if(is_null($inspection)) {
            \Session::flash(
                'message','Inspection not found, please try again.'
            );
            return redirect('/projects');
        }

        return view('inspections.show')->with('inspection',$inspection);
    }

    public function getCreate() {
        $projects = \DB::table('projects')
            ->where('user_id', '=', \Auth::user()->id)
            ->orderBy('name','ASC')
            ->get();

        if(is_null($projects)) {
            \Session::flash(
                'message','No projects not found, please try again.'
            );
            return redirect('/projects');
        }

        $projects_menu = [];
        $projects_menu[0] = 'Please Select Project';

        foreach($projects as $project) {
            $projects_menu[$project->id] = $project->name.' - '.$project->description;
        }

        return view('inspections.create')->with([
            'projects_menu' => $projects_menu
        ]);

    }

    public function postCreate(Request $request) {
        /*
        $messages = [
            'not_in' => 'Please select project for your inspection.',
        ];
        */

        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'project_id' => 'not_in:0'
        ]);

        $data = $request->only(
            'project_id',
            'name',
            'description'
        );
        $data = array_values($data);

        \DB::table('inspections')->insertGetId([
              'project_id' => $data[0],
              'name' => $data[1],
              'description' => $data[2]
        ]);

        \Session::flash('message','Your inspection was added');
        return redirect('/inspections');
    }

    public function getEdit($id) {
        $inspection = \DB::table('inspections')->where('id', '=', $id)->get();

        if(is_null($inspection)) {
            \Session::flash('message','Inspection not found.');
            return redirect('/inspections');
        }

        return view('inspections.edit')->with('inspection',$inspection);
    }

    public function postEdit(Request $request) {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
        ]);

        $data = $request->only(
            'project_id',
            'id',
            'name',
            'description'
        );
        $data = array_values($data);

        \DB::table('inspections')->where('id', '=', $data[1])->update([
            'project_id' => $data[0],
            'name' => $data[2],
            'description' => $data[3],
        ]);

        \Session::flash('message','Your inspection was updated.');
        return redirect('/inspections');
    }

    public function getDelete($id) {
        $inspection = \DB::table('inspections')->where('id', '=', $id)->get();

        if(is_null($inspection)) {
            \Session::flash('flash_message','Inspection not found.');
            return redirect('/inspections');
        }

        return view('inspections.delete')->with('inspection', $inspection);
    }

    public function postDelete($id) {
        # $inspection = \DB::table('inspections')->where('id', '=', $id)->delete();
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

        \DB::table('projects')->where('id', $data[1])->delete();

        \Session::flash('flash_message','Inspection was deleted.');
        return redirect('/inspections');
    }
}
