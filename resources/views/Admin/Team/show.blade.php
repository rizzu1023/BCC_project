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
				<h1 class="title1 text-center">{{$Team['team_name']}}</h1>
					<div class="col-md-8 col-md-offset-2">

					<table class="table table-sm table-striped" style="margin-top:50px;">
						<thead>
						<tr class="bg-dark">
							<th scope="col">Tournament</th>
							<th scope="col">Position</th>
						</tr>
						</thead>
						<tbody>
						@foreach($tournament as $t)
						<tr>
							<td>{{$t->tournament_name}}</td>
							<td>{{$t->Teams->first()->pivot->position}}</td>
                            
						</tr>
                        @endforeach
						</tbody>
					</table>
				</div>




			</div>
</div>

@endsection
