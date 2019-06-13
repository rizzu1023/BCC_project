<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Events\firstEvent;


use App\Schedule;
use App\Teams;


class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedule = Schedule::all();
        
        // event(New firstEvent($schedule));

        return view('admin/Schedule/index',compact('schedule'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $team = Teams::all();
        return view('admin/Schedule/create',compact('team'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'match_no' => 'required',
            'team1_id' => 'required',
            'team2_id' => 'required',
            'tournament' => 'required',
            'times' => 'required',
            'dates' => 'required',
        ]);
        Schedule::create($data);

        return redirect::route('Schedule.index')->with('message','Succesfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $Schedule)
    {
       $team = Teams::all();
       return view('admin/Schedule/edit',compact('Schedule','team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $Schedule)
    {
        $data = request()->validate([
            'match_no' => 'required',
            'team1_id' => 'required',
            'team2_id' => 'required',
            'times' => 'required',
            'dates' => 'required',
            ]);
        $Schedule->update($data);

        return redirect::route('Schedule.index')->with('message','Succesfully Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $Schedule)
    {
        $Schedule->delete();
        return redirect::route('Schedule.index')->with('message','Successfully Deleted');
    }
}
