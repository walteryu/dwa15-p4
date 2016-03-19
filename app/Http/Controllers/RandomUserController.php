<?php

namespace P3\Http\Controllers;

use Illuminate\Http\Request;

use P3\Http\Requests;
use P3\Http\Controllers\Controller;

use P3\Vendor\Faker\Factory;

class RandomUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('random-user.index');
    }

    public function getShow($count = null)
    {
      $user = \Faker\Factory::create();
      // echo $user->name.'<br>';
      // echo $user->email.'<br>';
      // echo $user->address.'<br>';

      for ($x = 0; $x <= $count; $x++) {
          $user = \Faker\Factory::create();
          $users[] = $user;
      }

      /*
        foreach($users as $user):
            echo $user->name;
            echo '<p>';
            echo $user->email;
            echo '<p>';
            echo $user->address;
            echo '<p>';
        endforeach;
      */
      return view('random-user.show')->with('users', $users);
    }

    public function getCreate()
    {
      $user = \Faker\Factory::create();
      $users[] = $user;

      return view('random-user.create')->with('users', $users);
    }

    public function postCreate(Request $request)
    {
      $this->validate($request,[
        'count' => 'required|digits:1'
      ]);

      for ($x = 0; $x <= $count; $x++) {
          $user = \Faker\Factory::create();
          $users[] = $user;
      }

      return view('random-user.create')->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
}
