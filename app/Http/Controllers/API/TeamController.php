<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\TeamResource;
use App\Teams;
use App\Tournament;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Tournament $tournament)
    {
        $tournament_id = $tournament->id;
        $team = Teams::whereHas('tournaments',function($query) use($tournament_id){
            $query->where('tournament_id',$tournament_id);
        })->get();
        return TeamResource::collection($team);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'team_code' => 'required|unique:teams',
            'team_name' => 'required',
            'team_title' => 'required|numeric',
        ]);

        return Teams::create([
            'team_code' => $request['team_code'],
            'team_name' => $request['team_name'],
            'team_title' => $request['team_title'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        $team = Teams::findOrFail($id);

        $this->validate($request,[
            'team_code' => 'required',
            'team_name' => 'required',
            'team_title' => 'required|numeric',
        ]);

        $team->update($request->all());

        return ['message' , 'Team updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Teams::findOrFail($id);
        $team->delete();
        return ['message' => 'Team Deleted'];
    }
}
