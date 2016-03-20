<?php

namespace P3\Http\Controllers;

use Illuminate\Http\Request;

use P3\Http\Requests;
use P3\Http\Controllers\Controller;

use P3\Vendor\Nesbot\Carbon\src;
use P3\Vendor\Badcow\LoremIpsum\Generator;

class LoremIpsumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $date_time = \Carbon\Carbon::now('America/Los_Angeles');
        return view('lorem-ipsum.index')->with('date_time', $date_time);;
    }

    public function getCreate()
    {
        $paragraphs[] = 'No Lorem Generated Yet';
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getShow($count = null)
    {
        $generator = new \LoremIpsumGenerator();
        $paragraphs = $generator->getParagraphs($count);

        return view('lorem-ipsum.show')->with('paragraphs', $paragraphs);
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
