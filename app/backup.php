public function StrikeRotate($match_id, $team_id, $tournament)
{
$nonstriker = MatchPlayers::where('match_id', $match_id)
->where('tournament', $tournament)
->where('team_id', $team_id)
->where('bt_status', 10)->first();

$striker = MatchPlayers::where('match_id', $match_id)
->where('tournament', $tournament)
->where('team_id', $team_id)
->where('bt_status', 11)->first();

MatchPlayers::where('match_id', $match_id)
->where('tournament', $tournament)
->where('team_id', $team_id)
->where('player_id', $nonstriker->player_id)
->update(['bt_status' => 11]);

MatchPlayers::where('match_id', $match_id)
->where('tournament', $tournament)
->where('team_id', $team_id)
->where('player_id', $striker->player_id)
->update(['bt_status' => 10]);
}


public function CheckForOver($tournament, $match_id, $team_id, $request, $attacker_id = NULL)
{

if ($attacker_id) {

$bw_overball = MatchPlayers::select('bw_overball')->where('match_id', $match_id)
->where('tournament', $tournament)
->where('team_id', $team_id)
->where('player_id', $attacker_id)->first();

/*  MatchDetail::where('match_id', $match_id)
->where('tournament', $tournament)
->where('team_id', $team_id)
->update(['isOver' => 0]);*/

// $rem = fmod($bw_overs->bw_overs,1);
// if($rem > 0.5){
/*     if ($bw_overball->bw_overball > 5) {


MatchPlayers::where('match_id', $match_id)
->where('tournament', $tournament)
->where('team_id', $team_id)
->where('player_id', $attacker_id)
->update(['bw_overball' => 0]);

MatchPlayers::where('match_id', $match_id)
->where('tournament', $tournament)
->where('team_id', $team_id)
->where('player_id', $attacker_id)
->increment('bw_over', 1);

MatchDetail::where('match_id', $match_id)
->where('tournament', $tournament)
->where('team_id', $team_id)
->update(['isOver' => 1]);

}*/
} else {
$overball = MatchDetail::select('overball')->where('match_id', $match_id)
->where('tournament', $tournament)
->where('team_id', $team_id)->first();

// $rem = fmod($bt_overs->overs_played,1);
// if($rem > 0.5){
if ($overball->overball > 5) {
MatchDetail::where('match_id', $match_id)
->where('team_id', $team_id)
->where('tournament', $tournament)
->update(['overball' => 0]);

MatchDetail::where('match_id', $match_id)
->where('team_id', $team_id)
->where('tournament', $tournament)
->increment('over', 1);

event(new strikeRotateEvent($request));

}
}
}





if($matchs['choose'] == 'Bat')
{
if($matchs->MatchDetail['0']->team_id == $matchs['toss']){
$batting = $matchs->MatchDetail['0']->team_id;
$bowling = $matchs->MatchDetail['1']->team_id;

$isOver = $matchs->MatchDetail['0']->isOver;
$isWicket = $matchs->MatchDetail['0']->isWicket;
}
else{
$batting = $matchs->MatchDetail['1']->team_id;
$bowling = $matchs->MatchDetail['0']->team_id;

$isOver = $matchs->MatchDetail['1']->isOver;
$isWicket = $matchs->MatchDetail['1']->isWicket;
}
}
else{
if($matchs->MatchDetail['0']->team_id == $matchs['toss']){
$batting = $matchs->MatchDetail['1']->team_id;
$bowling = $matchs->MatchDetail['0']->team_id;

$isOver = $matchs->MatchDetail['0']->isOver;
$isWicket = $matchs->MatchDetail['0']->isWicket;

}
else{
$batting = $matchs->MatchDetail['0']->team_id;
$bowling = $matchs->MatchDetail['1']->team_id;

$isOver = $matchs->MatchDetail['1']->isOver;
$isWicket = $matchs->MatchDetail['1']->isWicket;
}
}


