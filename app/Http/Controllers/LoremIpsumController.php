<?php

namespace P3\Http\Controllers;

use Illuminate\Http\Request;

use P3\Http\Requests;
use P3\Http\Controllers\Controller;

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
      return view('lorem-ipsum.index');
    }

    public function getCreate()
    {
      return view('lorem-ipsum.create');
    }

    public function postCreate(Request $request) {

      $this->validate($request,[
        'count' => 'required'
        // 'title' => 'required|min:3',
        // 'author' => 'required'
      ]);

      // return 'Added Some Lorem: '.$request->input('count');

      $generator = new \LoremIpsumGenerator();
      $paragraphs = $generator->getParagraphs($request->input('count'));
      // echo implode('<p>', $paragraphs);

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
      // echo implode('<p>', $paragraphs);

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
