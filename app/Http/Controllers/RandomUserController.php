<?php

namespace P3\Http\Controllers;

use Illuminate\Http\Request;

use P3\Http\Requests;
use P3\Http\Controllers\Controller;

use P3\Vendor\Faker\Factory;
use P3\Vendor\Nesbot\Carbon\src;

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
      $user_name[] = $user->name;
      $user_email[] = $user->email;
      $user_address[] = $user->address;

      $user_data[] = $user_name;
      $user_data[] = $user_email;
      $user_data[] = $user_address;

      return view('random-user.create')->with('user_data', $user_data);
    }

    public function postCreate(Request $request)
    {
      $this->validate($request,[
        'count' => 'required|digits:1',
        'add_email',
        'add_address'
      ]);

      for ($x = 0; $x <= $request->input('count'); $x++) {
          $user = \Faker\Factory::create();
          $users[] = $user;
          $user_name[] = $user->name;
      }

      if ($request->input == 'add_email' ) {
          foreach($users as $user) {
              $user_email[] = $user->email;
          }
      }
      else {
          foreach($users as $user) {
              $user_email[] = 'No Email Requested';
          }
      }

      if ($request->input == 'add_address' ) {
          foreach($users as $user) {
              $user_address[] = $user->address;
          }
      }
      else {
          foreach($users as $user) {
              $user_address[] = 'No Address Requested';
          }
      }

      $user_data[] = $user_name;
      $user_data[] = $user_email;
      $user_data[] = $user_address;

      return view('random-user.create')->with('user_data', $user_data);
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
