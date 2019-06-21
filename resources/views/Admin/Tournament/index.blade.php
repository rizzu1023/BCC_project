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

				<h3 class="title1">Tournaments</h3>
                <a style="margin-bottom:20px" class="btn btn-primary btn-flat btn-pri" href="{{route('Tournament.create')}}"><i class="fa fa-plus"></i>Add</a>
                <div class="tables">
					<div class="panel-body widget-shadow">
						<table class="table">
							<thead>
								<tr>
								  <th></th>
								  <th>Tournament_id</th>
								  <th>Tournament Name</th>
								</tr>
							</thead> 
							<tbody> 
                            @foreach($Tournament as $t)
                                <tr>
								  <td>
								  <a class="btn btn-success btn-sm" href="/admin/Tournament/{{$t->id}}/edit">Edit</a>
								  <a class="btn btn-warning btn-sm" href="/admin/Tournament/{{$t->id}}">Show</a>
								  <form style="display:inline-block" method="POST" action="/admin/Tournament/{{$t->id}}">
								  @csrf
								  	@method('DELETE')
									  <button class="btn btn-danger btn-sm">Delete</button>
								  </form>

								  </td>
								  <th scope="row">{{$t->id}}</th>
								  <td>{{$t->tournament_name}}</td>
							    </tr>
                            @endforeach
							</tbody>
						</table>
					</div>
                    </div>
			</div>
</div>

@endsection