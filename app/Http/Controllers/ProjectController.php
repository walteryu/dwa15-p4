<?php

namespace P3\Http\Controllers;

use Illuminate\Http\Request;

use P3\Http\Requests;

class ProjectController extends Controller
{
    function getIndex() {
        $projects = \App\Project::all();
        return view('projects.index')->with('projects', $projects);
    }
}
