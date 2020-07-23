@extends('Admin.layouts.base')

@section('content')


<div class="card">
			<div class="card-body">

			@if(session()->has('message'))
                <div class="alert alert-success">
                {{ session()->get('message') }}
                <button type="button" class="close fa fa-times text-danger" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
              </div>
			@endif
				<h3 class="title1">Live Score</h3>
                <div class="tables">
						<table class="table table-responsive-sm">
							<thead>
								<tr>
								  <th>Match No</th>
								  <th>Team 1</th>
                  <th>Vs</th>
								  <th>Team 2</th>
								</tr>
							</thead>
							<tbody>
                       @foreach($schedule as $s)
                <tr>
								  <th scope="row">{{$s->match_no}}</th>
								  <td>{{$s->Teams1->team_name}}</td>
                  <td>Vs</td>
								  <td>{{$s->Teams2->team_name}}</td>
									<td>
									  	<a class="btn btn-warning btn-sm" href="/admin/StartScore/{{$s->id}}">Start</a>
								  @foreach($start as $st)
									@if($st->match_id == $s->id)
									  <a class="btn btn-dark btn-sm" href="/admin/LiveUpdate/{{$s->id}}/{{$st->tournament_id}}">Score</a>
									@endif
								  @endforeach
									</td>
								</tr>
                @endforeach
							</tbody>
						</table>
                    </div>
			</div>
</div>

@endsection
