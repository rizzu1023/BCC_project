@extends('Admin.layouts.base')


@section('content')

<div class="card">
			<div class="card-body">
				@if(count($result) > 0)
				<h3 class="title1">Results</h3>
              <div class="tables">
                  <table class="table table-responsive-sm">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Match No</th>
                        <th>Team 1</th>
                        <th>Vs</th>
                        <th>Team 2</th>
                      </tr>
                    </thead>
                    <tbody>
                        @for($i=0 ; $i<count($result); $i=$i+2)
                      <tr>
                        <td>
                        <!-- <a class="btn btn-success btn-sm" href="">Edit</a> -->
                        <form method="POST" action="{{route('Post_BrowseResult')}}">
                         @csrf
                           <input type="hidden" value="{{$result[$i]->match_id}}" name="match_id"/>
                           <input type="hidden" value="{{$result[$i]->tournament_id}}" name="tournament"/>
								           <button type="submit" class="btn btn-sm btn-primary">Browse</button>

                        </form>
                        </td>
                        <th scope="row">{{$result[$i]->match_id}}</th>
                        <td>{{$result[$i]->Teams->team_name}}</td>
                        <td>Vs</td>
                        <td>{{$result[$i+1]->Teams->team_name}}</td>
                        <td>
                          <form action="{{route('Post_DeleteResult')}}" method="POST">
						            		@csrf
								          <input type="hidden" value="{{$result[$i]->match_id}}" name="match_id">
                          <input type="hidden" value="{{$result[$i]->tournament_id}}" name="tournament"/>
								          <button class="btn btn-sm btn-danger">Delete</button>
                          </form>
                        </td>
                      </tr>
                      @endfor
                    </tbody>
                  </table>
                    </div>

					@else
					  <div class="container">
					  		<p>No results found</p>
					  </div>
					@endif



			</div>
</div>

@endsection
