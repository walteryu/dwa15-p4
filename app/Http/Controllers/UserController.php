<?php

namespace P3\Http\Controllers;

use Illuminate\Http\Request;

use P3\Http\Requests;

class UserController extends Controller
{
    public function getIndex() {
        $users = \App\User::all();
        return view('users.index')->with('users', $users);
    }

    public function getShow($name = null) {
        return view('users.show',[
            'name' => $name,
        ]);
    }

    public function getCreate() {
        return view('users.create');
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
        \App\User::create($data);

        \Session::flash('message','Your user was added');
        return redirect('/users');
    }

    public function getEdit($id) {

        $book = \App\Book::with('tags')->find($id);

        return view('books.edit')->with('book',$book);
    }

    public function postEdit(Request $request) {
        $user = \App\User::find($request->id);

        # $book->title = $request->title;
        # $book->author_id = $request->author_id;
        # $book->cover = $request->cover;
        # $book->published = $request->published;
        # $book->purchase_link = $request->purchase_link;

        $user->save();

        \Session::flash('message','Your changes were saved.');
        return redirect('/user/edit/'.$request->id);
    }
}
