<?php

namespace StormSafe\Http\Controllers;

use Illuminate\Http\Request;

use StormSafe\Http\Requests;
use StormSafe\Http\Controllers\Controller;

use StormSafe\Vendor\Nesbot\Carbon\src;
use StormSafe\Vendor\Badcow\LoremIpsum\Generator;

class LoremIpsumController extends Controller
{
    public function getIndex()
    {
        $date_time = \Carbon\Carbon::now('America/Los_Angeles');
        return view('lorem-ipsum.index')->with('date_time', $date_time);
    }

    public function getCreate()
    {
        $paragraphs[] = 'No Random Text Generated Yet';
        return view('lorem-ipsum.create')->with('paragraphs', $paragraphs);
    }

    public function postCreate(Request $request)
    {
        $this->validate($request,[
            'count' => 'required|digits:1'
        ]);

        $generator = new \LoremIpsumGenerator();
        $paragraphs = $generator->getParagraphs($request->input('count'));

        if ($request->input == 'add_random' ) {
            shuffle($paragraphs);
        }

        return view('lorem-ipsum.create')->with('paragraphs', $paragraphs);
    }
}
