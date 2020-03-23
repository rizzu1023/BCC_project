<?php

namespace App\Http\Controllers\API;

use App\Batting;
use App\Http\Resources\BattingResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BattingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BattingResource::collection(Batting::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $batting = Batting::findOrFail($id);
        return new BattingResource($batting);
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
        $this->validate($request, [
            'bt_matches' => 'required|numeric',
            'bt_innings' => 'required|numeric',
            'bt_fours' => 'required|numeric',
        ]);

        $batting = Batting::findOrFail($id);

        $batting->update($request->all());
        return $request->all();
        return ['message' => 'Updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
