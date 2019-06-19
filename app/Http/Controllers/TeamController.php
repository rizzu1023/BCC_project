<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Teams;
use App\PointsTable;
use App\Tournament;


class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
        $team = Teams::all();
        $tournament = Tournament::all();
        return view('admin/Team/index',compact('team','tournament'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tournament = Tournament::all();
        return view('admin/Team/create',compact('tournament'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $t = Teams::create(request(['team_code','team_name','team_title']));
        $t->id;
        
        $team = Teams::find($t->id);
        
        $tournament = Tournament::find(request('tournament_id'));
        $team->Tournaments()->syncWithoutDetaching($tournament);

        return redirect::route('Team.index')->with('message','Team has been successfully added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Teams $Team)
    {
        $id = $Team->id;
        $tournament = Tournament::whereHas('teams',function($query) use($id){
            $query->where('team_id',$id);
        })->get(); 
        // return $tournament;
        return view('admin/Team/show',compact('Team','tournament'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Teams::find($id);
        return view('admin/Team/edit',compact('team'));
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
        $team = Teams::find($id);
        $team->update(request(['team_id','team_name','team_won']));
        return redirect::route('Team.index')->with('message','Team has been succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Teams $Team)
    {
        $tournament =  Tournament::where('id',$request->tournament_id)->first();
        $team = Teams::where('id',$Team->id)->first();
        // return $team;

        $team->Tournaments()->detach($tournament);
    
        // $team->delete();

     
        // $pointstable = PointsTable::where('team_id',$team->team_id)->first();
        // $pointstable->delete();

        return back()->with('message','Team has been successfully deleted');
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
