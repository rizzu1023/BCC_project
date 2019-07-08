<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Events\firstEvent;


use App\Schedule;
use App\Teams;
use App\Tournament;


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
        $team = NULL;
        $tournament_name = NULL;
        $tournament = Tournament::all();
        return view('admin/Schedule/create',compact('team','tournament','tournament_name'));
    }
    public function scheduleTournament(Request $request){
        $tournament_id = request('tournament_id');
        $team = Teams::whereHas('tournaments',function($query) use($tournament_id){
            $query->where('tournament_id',$tournament_id);
        })->get();
        $tournament = Tournament::all();
        $temp = Tournament::find($tournament_id);
        $tournament_name = $temp->tournament_name;
        return view('admin/Schedule/create',compact('team','tournament','tournament_name'));
    }

    /**
     * Store a newly created resource in storage. 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Schedule $Schedule)
    {
        $Schedule->addSchedule(); 
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
       $tournament = Tournament::all();
       return view('admin/Schedule/edit',compact('Schedule','team','tournament'));
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
        $Schedule->updateSchedule();
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
        return back()->with('message','Successfully Deleted');
    }
}
