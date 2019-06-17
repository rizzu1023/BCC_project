<?php

namespace App\Http\Controllers;

use App\Bowling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class BowlingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bowling = Bowling::all();
        return view('admin/Bowling/index', compact('bowling'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Display the specified resource.
     *
     * @param  \App\Bowling  $bowling
     * @return \Illuminate\Http\Response
     */
    public function show(Bowling $bowling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bowling  $bowling
     * @return \Illuminate\Http\Response
     */
    public function edit(Bowling $Bowling)
    {
        return view('Admin/Bowling/edit',compact('Bowling'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bowling  $bowling
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bowling $Bowling)
    {
        $Bowling->update(request(['bw_matches','bw_innings', 'bw_wickets', 'bw_balls']));
        return redirect::route('Bowling.index')->with('message','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bowling  $bowling
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bowling $bowling)
    {
        //
    }
}
