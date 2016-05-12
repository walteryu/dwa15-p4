<?php

namespace StormSafe\Http\Controllers;

use Illuminate\Http\Request;

use StormSafe\Http\Requests;

class UserController extends Controller
{
    public function getIndex() {
        # $users = \App\User::all();
        $users = \DB::table('projects')->get();

        return view('users.index')->with('users', $users);
    }

    public function getShow($name = null) {
        return view('users.show')->with('name',$name);
    }

    public function getCreate() {
        return view('users.create');
    }

    public function postCreate(Request $request) {
        $this->validate($request,[
            # Placeholder for now, do not wish to break pages for project submission
        ]);

        $data = $request->only(
            # Placeholder for now, do not wish to break pages for project submission
        );
        \App\User::create($data);

        \Session::flash('message','Your user was added');
        return redirect('/users');
    }

    public function getEdit($id) {
        $user = \App\User::find($request->id);

        return view('users.edit')->with('name',$name);
    }

    public function postEdit(Request $request) {
        $user = \App\User::find($request->id);
        $user->save();

        \Session::flash('message','Your changes were saved.');
        return redirect('/user/edit/'.$request->id);
    }

    public function getConfirmDelete($user_id) {
        $user = \App\User::find($user_id);
        return view('users.delete')->with('user', $user);
    }

    public function getGoDelete($id) {
        $user = \App\User::find($id);

        if(is_null($user)) {
            \Session::flash('flash_message','User not found.');
            return redirect('/users');
        }

        $user->delete();
        \Session::flash('flash_message','User was deleted.');
        return redirect('/users');
    }
}
