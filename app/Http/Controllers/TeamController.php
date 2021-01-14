<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\Teams;
use App\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class TeamController extends Controller
{

    public function index()
    {
        $teams = Teams::all();
        return view('Admin.Team.index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Teams $team
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Teams $team){
         return view('Admin.Team.create',compact('team'));
    }


    public function store(Request $request)
    {

        $team = Teams::create([
            'team_code' => $request['team_code'],
            'team_name' => $request['team_name'],
            'team_title' => $request['team_title'],
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('teams.index')->with('message','Successfully Added');
    }


    public function show(Teams $Team)
    {
        return view('Admin.Team.show',compact('Team'));
    }

    public function edit( Teams $team)
    {
        return view('Admin.Team.edit',compact('team'));
    }

    public function update(Request $request, Teams $team)
    {
        $team->update([
            'team_code' => $request['team_code'],
            'team_name' => $request['team_name'],
            'team_title' => $request['team_title'],
            'user_id' => auth()->user()->id,
        ]);
        return redirect::route('teams.index')->with('message','Team has been successfully updated');
    }

    public function destroy(Teams $team)
    {
        $schedule = Schedule::where('team1_id',$team->id)->orWhere('team2_id',$team->id)->first();
        if($schedule){
            return back()->with('message','First Delete Schedule of This Team');
        }
        else{
            $team->delete();
            return back()->with('message','Team has been successfully deleted');
        }
    }

//    public function teamFilter(Request $request){
//            $id = request('tournament_id');
//            // return $id;
//            $tournament = Tournament::all();
//            $team = Teams::whereHas('tournaments',function($query) use($id){
//                    $query->where('tournament_id',$id);
//                })->get();
//            return view('Admin/Team/index',compact('tournament','team'));
//    }
}
