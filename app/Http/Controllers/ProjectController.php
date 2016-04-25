<?php

namespace StormSafe\Http\Controllers;
# namespace App\Http\Controllers;

use StormSafe\Http\Controllers\Controller;

use Illuminate\Http\Request;
use StormSafe\Http\Requests;

class ProjectController extends Controller
{
    function getIndex() {
        # $projects = \App\Project::all();
        $projects = \DB::table('projects')->get();
        return view('projects.index')->with('projects', $projects);
    }

    public function getShow($name = null) {
        return view('projects.show')->with('name',$name);
    }

    public function getCreate() {
        return view('projects.create');
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

        # \App\Project::create($data);
        DB::table('projects')->create($data);

        \Session::flash('message','Your project was added');
        return redirect('/projects');
    }

    public function getEdit($id) {
        # $project = \App\Project::find($request->id);
        $project = DB::table('projects')->find($request->id);

        return view('projects.edit')->with('name',$name);
    }

    public function postEdit(Request $request) {
        # $project = \App\Project::find($request->id);
        $project = DB::table('projects')->find($request->id);

        # $book->title = $request->title;
        # $book->author_id = $request->author_id;
        # $book->cover = $request->cover;
        # $book->published = $request->published;
        # $book->purchase_link = $request->purchase_link;

        $project->save();

        \Session::flash('message','Your changes were saved.');
        return redirect('/project/edit/'.$request->id);
    }

    public function getConfirmDelete($id) {
        $project = \App\Project::find($id);
        return view('projects.delete')->with('project', $project);
    }

    public function getGoDelete($id) {
        $project = \App\Project::find($id);

        if(is_null($project)) {
            \Session::flash('flash_message','project not found.');
            return redirect('/projects');
        }

        $project->delete();
        \Session::flash('flash_message','project was deleted.');
        return redirect('/projects');
    }
}
