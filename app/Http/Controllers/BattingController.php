<?php

namespace App\Http\Controllers;

use App\Batting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class BattingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batting = Batting::all();
        return view('admin/Batting/index', compact('batting'));
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
     * @param  \App\Batting  $batting
     * @return \Illuminate\Http\Response
     */
    public function show(Batting $batting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Batting  $batting
     * @return \Illuminate\Http\Response
     */
    public function edit(Batting $Batting)
    {
        return view('/Admin/Batting/edit',compact('Batting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Batting  $batting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Batting $Batting)
    {
        $Batting->update(request(['bt_matches','bt_innings', 'bt_fours', 'bt_balls']));
        return redirect::route('Batting.index')->with('message','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Batting  $batting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Batting $batting)
    {
        //
    }
}
