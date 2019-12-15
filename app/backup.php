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

