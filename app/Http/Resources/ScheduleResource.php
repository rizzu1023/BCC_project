<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Teams;

class ScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $times = date('h:i A', strtotime($this->times));
        $dates = date('d M y', strtotime($this->dates));


        // calculating required_balls from overs
        $current_over = 0;
        $current_overball = 0;
        $required_balls = 0;
        $required_runs = 0;
        if($this->Match['status'] == 3) {
            if ($this->MatchDetail['0']->isBatting == '1') {
                $current_over = $this->MatchDetail['0']->over;
                $current_overball = $this->MatchDetail['0']->overball;
            } else {
                $current_over = $this->MatchDetail['1']->over;
                $current_overball = $this->MatchDetail['1']->overball;
            }
            $total_over = $this->Match['overs'];
            $total_overball = 0;

            $required_over = $total_over - $current_over;
            $required_overball = $total_overball - $current_overball;

            $required_balls = ($required_over * 6) + $required_overball;

            //calculating runs
            $fielding_team_score = 0;
            $batting_team_score = 0;
            if ($this->MatchDetail['0']->isBatting == '1') {
                $batting_team_score = $this->MatchDetail['0']->score;
                $fielding_team_score = $this->MatchDetail['1']->score;
            } else {
                $batting_team_score = $this->MatchDetail['1']->score;
                $fielding_team_score = $this->MatchDetail['0']->score;
            }

            $required_runs = ($fielding_team_score + 1) - $batting_team_score;
        }

        $team = Teams::where('id',$this->Match['won'])->first();
        $won = $team['team_name'];

        $toss = null;
        if($this->Match){
            if($this->Match->Toss){
                $toss = $this->Match->Toss['team_name'];
            }
        }

        return [
            'status' => $this->Match['status'],
            'toss' => $toss,
            'choose' => $this->Match['choose'],
            'balls_required' => $required_balls,
            'runs_required' => $required_runs,
            'won' => $won,
            'description' => $this->Match['description'],
            'match_detail' => $this->MatchDetail,
            'id' => $this->id,
            'match_no' => $this->match_no,
            'team1_id' => $this->Teams1,
            'team2_id' => $this->Teams2,
            'times' => $times,
            'dates' => $dates,
            'tournament_id' => $this->tournament_id,
        ];
    }
}
