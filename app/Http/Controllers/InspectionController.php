<?php

namespace StormSafe\Http\Controllers;

use Illuminate\Http\Request;
use StormSafe\Http\Requests;

class InspectionController extends Controller
{
    function getIndex() {
        $inspections = \DB::table('inspections')->get();
        return view('inspections.index')->with('inspections', $inspections);
    }

    public function getCreate() {
        return view('inspections.create');
    }

    public function postCreate(Request $request) {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
        ]);

        $data = $request->only(
            'project_id',
            'name',
            'description'
        );

        \DB::table('inspections')->insertGetId(
            array(
                # 'project_id' => $data->id,
                'name' => 'name',
                'description' => 'description',
            )
        );

        \Session::flash('message','Your inspection was added');
        return redirect('/inspections');
    }

    public function getEdit($id) {
        $inspection = \DB::table('inspections')->where('id', '=', $id)->get();
        return view('inspections.edit')->with('inspection',$inspection);
    }

    public function postEdit(Request $request) {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
        ]);

        $data = $request->only(
            'user_id',
            'id',
            'name',
            'description'
        );

        $data = array_values($data);

        \DB::table('projects')->where('id', '=', $data[1])->update([
            # 'project_id' => $data[1],
            'name' => $data[2],
            'description' => $data[3],
        ]);

        \Session::flash('message','Your inspection was updated.');
        return redirect('/inspections');
    }

    public function getShow($id) {
        $inspection = \DB::table('inspections')->where('id', '=', $id)->get();
        return view('inspections.show')->with('inspection',$inspection);
    }

    public function getDelete($id) {
        $inspection = \DB::table('inspections')->where('id', '=', $id)->get();
        return view('inspections.delete')->with('inspection', $inspection);
    }

    public function postDelete($id) {
        $inspection = \DB::table('inspections')->where('id', '=', $id)->delete();

        if(is_null($inspection)) {
            \Session::flash('flash_message','Inspection not found.');
            return redirect('/inspections');
        }

        $inspection->delete();
        \Session::flash('flash_message','Inspection was deleted.');
        return redirect('/inspections');
    }
}
