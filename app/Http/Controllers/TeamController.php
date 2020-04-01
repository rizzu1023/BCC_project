<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Teams;
use App\PointsTable;
use App\Tournament;
use App\Schedule;


class TeamController extends Controller
{

    public function index(Tournament $tournament)
    {

        $tournament_id = $tournament->id;
        $team = Teams::whereHas('tournaments',function($query) use($tournament_id){
            $query->where('tournament_id',$tournament_id)->where('user_id',auth()->user()->id);
        })->get();
        if($tournament->user_id == auth()->user()->id){
            return view('Admin/Team/index',compact('team','tournament'));
        }
        else
            return "Page Not Found";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $message = NULL;
        // return view('admin/Team/create',compact('message'));
    }


    public function store(Request $request,$tournament)
    {

        $team = Teams::create(request(['team_code','team_name','team_title']));

        $tnt = Tournament::find($tournament);
        $team->Tournaments()->syncWithoutDetaching($tnt);

        return response()->json(['message'=> 'Team has been successfully added']);
        return redirect::route('Team.index')->with('message','Team has been successfully added');

    }


    public function show(Tournament $tournament,Teams $Team)
    {
        $id = $Team->id;
        $tournament = Tournament::whereHas('teams',function($query) use($id){
            $query->where('team_id',$id);
        })->get();
        // return $tournament;
        return view('Admin/Team/show',compact('Team','tournament'));
    }

    public function edit(Tournament $tournament, Teams $team)
    {
        $team = Teams::find($team->id);
        return view('Admin/Team/edit',compact('team','tournament'));
    }

    public function update(Request $request, Tournament $tournament, Teams $team)
    {
        $team->update(request(['team_code','team_name','team_won']));
        return redirect::route('tournaments.teams.index',$tournament->id)->with('message','Team has been succesfully updated');
    }

    public function destroy(Tournament $tournament,Teams $team)
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

    public function teamFilter(Request $request){
            $id = request('tournament_id');
            // return $id;
            $tournament = Tournament::all();
            $team = Teams::whereHas('tournaments',function($query) use($id){
                    $query->where('tournament_id',$id);
                })->get();
            return view('Admin/Team/index',compact('tournament','team'));
    }
}
