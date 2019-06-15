@extends('Admin.layouts.base')
@section('content')

<div id="page-wrapper">
			<div class="main-page">
                    <div class="form-group">
                        <form method="POST" action="{{route('LiveScore')}}">
                        @csrf
                        @method('PUT')
                        <label for="team_name">Team Name</label>
                        <input type="text" id="team_name" value="{{$match[0]->team_id}}"  disabled/>

                        <label for="score">Score</label>
                        <input type="number" value="{{$match[0]->score}}" name="score" id="score"/>

                        <label for="wicket">Wickets</label>
                        <input type="number" value="{{$match[0]->wicket}}" name="wicket" id="wicket"/>

                        <input type="hidden" value="{{$match[0]->match_no}}" name="match_no">
                        <input type="hidden" value="{{$match[0]->tournament}}" name="tournament">
                        <input type="hidden" value="{{$match[0]->team_id}}" name="team_id">
                        <button type="submit" class="btn btn-sm btn-dark">Update</button>
                        <form>
                        <br>

                        <form method="POST" action="{{route('LiveScore')}}">
                        @csrf
                        @method('PUT')
                        <label for="team_name">Team Name</label>
                        <input type="text" id="team_name" value="{{$match[1]->team_id}}"  disabled/>

                        <label for="score">Score</label>
                        <input type="number" value="{{$match[1]->score}}" name="score" id="score"/>

                        <label for="wicket">Wickets</label>
                        <input type="number" value="{{$match[1]->wicket}}" name="wicket" id="wicket"/>

                        <input type="hidden" value="{{$match[1]->match_no}}" name="match_no">
                        <input type="hidden" value="{{$match[1]->tournament}}" name="tournament">
                        <button type="submit" class="btn btn-sm btn-dark">Update</button>
                        <form>
                    </div>
            </div>

</div>

@endsection
