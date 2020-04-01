<?php

namespace App\Http\Controllers;

use App\PointsTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class PointsTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pointstable = PointsTable::all();
        return view('Admin/PointsTable/index', compact('pointstable'));
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
     * @param  \App\PointsTable  $pointsTable
     * @return \Illuminate\Http\Response
     */
    public function show(PointsTable $pointsTable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PointsTable  $pointsTable
     * @return \Illuminate\Http\Response
     */
    public function edit(PointsTable $PointsTable)
    {
        return view('Admin/PointsTable/edit',compact('PointsTable'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PointsTable  $pointsTable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PointsTable $PointsTable)
    {
        $PointsTable->update([
            'match' => request('match'),
            'won' => request('won'),
            'lost' => request('lost'),
            'draw' => request('draw'),
            'points' => request('points'),
            'nrr' => request('nrr'),
        ]);

        return redirect::route('PointsTable.index')->with('message','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PointsTable  $pointsTable
     * @return \Illuminate\Http\Response
     */
    public function destroy(PointsTable $pointsTable)
    {
        //
    }
}
