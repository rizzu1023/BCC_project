@extends('Admin.layouts.base')

@section('content')

<div id="page-wrapper">
			<div class="main-page">
			
				<h3 class="title1">Results</h3>
                <form method="POST" action="{{route('Post_BrowseResult')}}">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Select Match</label>
                    <select class="form-control" id="exampleFormControlSelect2" name="match_no">
                        <!-- <option value=""></option> -->
                        @for($i=0 ; $i<count($result); $i=$i+2)
                            <option value="{{$result[$i]->match_no}}">Match {{$result[$i]->match_no}}.  {{$result[$i]->Teams->team_name}} vs {{$result[$i+1]->Teams->team_name}}</option>
                        @endfor
                    </select>
				</div>
                <input type="hidden" value="BCC2019" name="tournament"/>
				<button type="submit" class="btn btn-default">Browse</button> 
                
                </form>

                @if($single_result)
                <div class="tables">
					<div class="panel-body widget-shadow">
						<table class="table">
							<thead>
								<tr>
                                  <th>Sr</th>
								  <th>Player Name</th>
								  <th>Runs</th>
								  <th>Balls</th>
								  <th>Fours</th>
								  <th>Sixes</th>
								</tr>
							</thead>
							<tbody>
                            @foreach($single_result as $sr)
                                <tr>
								  <td>{{$loop->index}}</td>
								  <td>{{$sr->Players->player_name}}</td>
								  <td>{{$sr->bt_runs}}</td>
								  <td>{{$sr->bt_balls}}</td>
								  <td>{{$sr->bt_fours}}</td>
								  <td>{{$sr->bt_sixes}}</td>
								</tr>
                            @endforeach
							</tbody>
						</table>
					</div>
                @endif
			</div>
</div>

@endsection