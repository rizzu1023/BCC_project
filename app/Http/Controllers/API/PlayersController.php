<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\PlayersResource;
use App\Players;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $player = Players::orderBy('team_id', 'asc')->get();
        return PlayersResource::collection($player);
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
            'player_id' => 'required|unique:players',
            'player_name' => 'required',
            'player_role' => 'required',
            'team_id' => 'required',
        ]);

        return Players::create([
            'player_id' => $request['player_id'],
            'player_name' => $request['player_name'],
            'player_role' => $request['player_role'],
            'team_id' => $request['team_id'],
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
        $player = Players::findOrFail($id);

        $this->validate($request,[
            'player_id' => 'required',
            'player_name' => 'required',
            'player_role' => 'required',
            'team_id' => 'required',
        ]);

        $player->update($request->all());

        return ['message' , 'Player updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $player = Players::findOrFail($id);
        $player->delete();
        return ['message' => 'Player Deleted'];
    }
}
