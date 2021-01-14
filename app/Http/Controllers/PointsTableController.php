<?php

namespace App\Http\Controllers;

use App\Game;
use App\Models\Group;
use App\Models\GroupTeam;
use App\PointsTable;
use App\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class PointsTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Tournament $tournament
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Tournament $tournament)
    {
        $groups = Group::where('tournament_id',$tournament->id)->orderBy('group_name','asc')->get();
        $points_table = collect();
        foreach ($groups as $g){
            $teams = GroupTeam::where('tournament_id',$g->tournament_id)->where('group_id',$g->id)->orderBy('points','desc')->orderBy('nrr','desc')->get();
            $points_table->push(['group_name' => $g->group_name, 'teams' => $teams]);
        }
//        return  $points_table;
//        $points_table = GroupTeam::where('tournament_id',$tournament->id)->get();
        return view('Admin.Tournament.points-table-index',compact('points_table','tournament'));
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
     * @param Tournament $tournament
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Tournament $tournament)
    {
        $matches = Game::where('tournament_id',$tournament->id)->where('status','>=',4)->get();
        return view('Admin.Tournament.points-table-edit',compact('matches','tournament'));
    }

    public function match_selected(Tournament $tournament,Request $request)
    {
        $match = Game::where('tournament_id',$tournament->id)->where('match_id',$request->match_id)->first();
        $match_detail = $match->MatchDetail;
        $team1 = $match->MatchDetail[0]->Teams;
        $team2 = $match->MatchDetail[1]->Teams;
        if($match_detail[0]->wicket == 10)
            $all_out1 = true;
        else
            $all_out1 = false;
        if($match_detail[1]->wicket == 10)
            $all_out2 = true;
        else
            $all_out2 = false;
        return response()->json(['success' => true, 'match' => $match, 'match_detail' => $match_detail, 'team1' => $team1, 'team2' => $team2,'all_out1'=>$all_out1, 'all_out2'=> $all_out2,'tournament' => $tournament]);
    }

    public function calculate_nrr($total_runs_scored, $overs_faced, $wickets_gone, $total_runs_conceded, $total_overs_bowled, $wickets_taken, $total_overs)
    {
        if($wickets_gone){
            $run_rate_for = $total_runs_scored / $total_overs;
        }
        else{
            $run_rate_for = $total_runs_scored / $overs_faced;
        }

        if($wickets_taken){
            $run_rate_against = $total_runs_conceded / $total_overs;
        }
        else{
            $run_rate_against = $total_runs_conceded / $total_overs_bowled;
        }

        $run_rate = $run_rate_for - $run_rate_against;
        return $run_rate;
    }
    public function nrr(Tournament $tournament,Request $request)
    {
//        return $request->all();

          if($request['run_scored1'] > $request['run_scored2']){
              $winning_team_id = $request['team1_id'];
              $losing_team_id = $request['team2_id'];
          }
          else{
              $winning_team_id = $request['team2_id'];
              $losing_team_id = $request['team1_id'];
          }
//        $total_runs_scored = 227;
//        $overs_faced = 5;
//        $wickets_gone = false;
//        $total_runs_conceded = 198;
//        $total_overs_bowled = 6;
//        $wickets_taken = true;
//        $total_overs = 20;

        $total_runs_scored = (int) $request['run_scored1'];
        $overs_faced = (float) $request['overs_played1'];
        if($request['all_out1'])  $wickets_gone = true;
        else $wickets_gone = false;
        $total_runs_conceded = (int) $request['run_scored2'];
        $total_overs_bowled = (float) $request['overs_played2'];
        if($request['all_out2'])  $wickets_taken = true;
        else $wickets_taken = false;
        $total_overs = (int) $request['total_overs1'];

        $run_rate = $this->calculate_nrr($total_runs_scored,$overs_faced,$wickets_gone,$total_runs_conceded,$total_overs_bowled,$wickets_taken,$total_overs);

        $winning_team = GroupTeam::where('team_id',$winning_team_id)->where('tournament_id',$tournament->id)->first();

        $losing_team = GroupTeam::where('team_id',$losing_team_id)->where('tournament_id',$tournament->id)->first();

        $winning_team->points = $winning_team->points + 2;
        $winning_team->nrr = $winning_team->nrr + $run_rate;
        $winning_team->won = $winning_team->won + 1;
        $winning_team->match = $winning_team->match + 1;
        $winning_team->save();

        $losing_team->nrr = $losing_team->nrr - $run_rate;
        $losing_team->match = $losing_team->match + 1;
        $losing_team->lost = $losing_team->lost + 1;
        $losing_team->save();

        return back();

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PointsTable  $pointsTable
     * @return \Illuminate\Http\RedirectResponse
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
