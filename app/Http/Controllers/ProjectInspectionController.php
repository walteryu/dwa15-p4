<?php

namespace StormSafe\Http\Controllers;

use Illuminate\Http\Request;

use StormSafe\Http\Requests;

class ProjectInspectionController extends Controller
{
    function getIndex() {
        # $inspections = \App\Inspection::all();
        $projects = \DB::table('projects')->with('inspections')->get();
        return view('inspections.index')->with('inspections', $inspections);
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
        ]);

        $data = $request->only(
            # 'title','author','published','cover','purchase_link'
        );
        \App\Inspection::create($data);

        \Session::flash('message','Your inspection was added');
        return redirect('/inspections');
    }

    public function getEdit($id) {
        $inspection = \App\Inspection::find($request->id);
        return view('inspections.edit')->with('name',$name);
    }

    public function postEdit(Request $request) {
        $inspection = \App\Inspection::find($request->id);

        # $book->title = $request->title;
        # $book->author_id = $request->author_id;
        # $book->cover = $request->cover;
        # $book->published = $request->published;
        # $book->purchase_link = $request->purchase_link;

        $inspection->save();

        \Session::flash('message','Your changes were saved.');
        return redirect('/inspection/edit/'.$request->id);
    }

    public function getConfirmDelete($id) {
        $inspection = \App\Inspection::find($id);
        return view('inspections.delete')->with('inspection', $inspection);
    }

    public function getGoDelete($id) {
        $inspection = \App\Inspection::find($id);

        if(is_null($inspection)) {
            \Session::flash('flash_message','Inspection not found.');
            return redirect('/inspections');
        }

        $inspection->delete();
        \Session::flash('flash_message','Inspection was deleted.');
        return redirect('/inspections');
    }
}
