<?php

namespace StormSafe\Http\Controllers;
use Illuminate\Http\Request;

use StormSafe\Http\Requests;
use StormSafe\Http\Controllers\Controller;

use StormSafe\Vendor\Faker\Factory;
use StormSafe\Vendor\Nesbot\Carbon\src;

class RandomUserController extends Controller
{
    public function getIndex()
    {
        return view('random-user.index');
    }

    public function getCreate()
    {
        $user = \Faker\Factory::create();
        $user_name[] = 'No User Generated Yet';
        $user_email[] = 'No User Email Generated Yet';
        $user_address[] = 'No User Address Generated Yet';

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

        if ($request->input('count') == 0) {
            $user = \Faker\Factory::create();
            $users[] = $user;
            $user_name[] = $user->name;
        }

        for ($x = 1; $x <= $request->input('count'); $x++) {
            $user = \Faker\Factory::create();
            $users[] = $user;
            $user_name[] = $user->name;
        }

        if ($request->input('add_email') == 'add_email' ) {
            foreach($users as $user) {
                $user_email[] = $user->email;
            }
        }
        else {
            foreach($users as $user) {
                $user_email[] = 'No Email Generated';
            }
        }

        if ($request->input('add_address') == 'add_address' ) {
            foreach($users as $user) {
                $user_address[] = $user->address;
            }
        }
        else {
            foreach($users as $user) {
                $user_address[] = 'No Address Generated';
            }
        }
        $user_data[] = $user_name;
        $user_data[] = $user_email;
        $user_data[] = $user_address;

        return view('random-user.create')->with('user_data', $user_data);
    }
}
