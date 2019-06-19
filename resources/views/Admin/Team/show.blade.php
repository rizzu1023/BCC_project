@extends('Admin.layouts.base')

@section('content')

<div id="page-wrapper">
			<div class="main-page">
				<h1 class="title1 text-center">{{$Team['team_name']}}</h1>
					<div class="col-md-8 col-md-offset-2">

					<table class="table table-sm table-striped" style="margin-top:50px;">
						<thead>
						<tr class="bg-dark">
							<th scope="col">Tournament</th>
							<th scope="col">Position</th>
							<th scope="col">Action</th>
						</tr>
						</thead>
						<tbody>
						@foreach($tournament as $t)
						<tr>
							<td>{{$t->tournament_name}}</td>
							<td>{{$t->Teams->first()->pivot->position}}</td>
                            <td><form style="display:inline-block" method="POST" action="/admin/Team/{{$t->Teams->first()->id}}">
								  @csrf
								  	@method('DELETE')
                                      <input type="hidden" name="tournament_id" value="{{$t->id}}"/>
									  <button class="btn btn-danger btn-sm">Delete</button>
								  </form></td>
						</tr>
                        @endforeach
						</tbody>
					</table>
				</div>




			</div>
</div>

@endsection
