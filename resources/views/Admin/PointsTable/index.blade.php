@extends('Admin.layouts.base')

@section('content')

<div id="page-wrapper">
			<div class="main-page">
			@if(session()->has('message'))
                <div class="alert alert-success">
                {{ session()->get('message') }}
                <button type="button" class="close fa fa-times text-danger" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
              </div>
			@endif
				<h3 class="title1">Points Table</h3>
                <div class="tables">
					<div class="panel-body widget-shadow">
						<table class="table">
							<thead>
								<tr>
								  <th></th>
								  <th>Sr</th>
								  <th>Team</th>
								  <th>Matches</th>
								  <th>Won</th>
								  <th>Lost</th>
								  <th>Draw</th>
								  <th>Points</th>
								  <th>NRR</th>
								</tr>
							</thead>
							<tbody>
							@php($i=1)
                            @foreach($pointstable as $pt)
                                <tr>
								  <td>
								  <a class="btn btn-success btn-sm" href="/admin/PointsTable/{{$pt->id}}/edit">Edit</a>
								  </td>
								  <th scope="row">{{$i}}</th> 
								  <td>{{$pt->Teams->team_name}}</td>
								  <td>{{$pt->match}}</td>
								  <td>{{$pt->won}}</td>
								  <td>{{$pt->lost}}</td>
								  <td>{{$pt->draw}}</td>
								  <td>{{$pt->points}}</td>
								  <td>{{$pt->nrr}}</td>

								</tr>
                                @php($i++)
                            @endforeach
							</tbody>
						</table>
					</div>
                    </div>
			</div>
</div>

@endsection
