<?php

namespace StormSafe\Http\Controllers;

use Illuminate\Http\Request;

use StormSafe\Http\Requests;

class UserController extends Controller
{
    public function getIndex() {
        # $users = \App\User::all();
        $users = \DB::table('users')
            ->orderBy('name', '=', 'ASC')
            ->get();

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

        # \App\User::create($data);
        \DB::table('users')->insertGetId([
            # Placeholder for now, do not wish to break pages for project submission
        ]);

        \Session::flash('message','Your user was added');
        return redirect('/users');
    }

    public function getEdit($id) {
        # $user = \App\User::find($request->id);
        $user = \DB::table('users')->where('id', '=', $id)->get();

        return view('users.edit')->with('name',$name);
    }

    public function postEdit(Request $request) {
        $this->validate($request,[
            # Placeholder for now, do not wish to break pages for project submission
        ]);

        $data = $request->only(
            # Placeholder for now, do not wish to break pages for project submission
        );
        $data = array_values($data);

        # Database facade used for create/edit method due to namespacing issue
        \DB::table('users')->where('id', '=', $data[1])->update([
            # Placeholder for now, do not wish to break pages for project submission
        ]);

        # $user = \App\User::find($request->id);
        # $user->save();

        \Session::flash('message','Your changes were saved.');
        return redirect('/user/edit/'.$request->id);
    }

    public function getConfirmDelete($user_id) {
        # $user = \App\User::find($user_id);
        $user = \DB::table('users')->where('id', '=', $id)->get();

        if(is_null($user)) {
            \Session::flash('flash_message','user not found, please try again.');
            return redirect('/users');
        }

        return view('users.delete')->with('user', $user);
    }

    public function getGoDelete($id) {
        # $user = \App\User::find($id);
        $data = $request->only(
            'id'
        );
        $data = array_values($data);

        \DB::table('users')->where('id', $data[1])->delete();

        /*
        if(is_null($user)) {
            \Session::flash('flash_message','User not found.');
            return redirect('/users');
        }
        $user->delete();
        */

        \Session::flash('flash_message','User was deleted.');
        return redirect('/users');
    }
}
