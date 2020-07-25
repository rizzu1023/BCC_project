@extends('Admin.layouts.base')

@section('content')
    <div class="card">
        <div class="card-header">
            <span class="title1">Teams</span>
            <button style="float: right" id="addButton" class="btn btn-success btn-sm" data-target="#myModal" data-toggle="modal"><i
                    class="fa fa-plus"></i>Create New Team</button>
        </div>
        <div class="card-body">


            @include('Admin.layouts.message')


            <div class="modal" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>Add Team</h3>
                        </div>
                        <div class="form-body">
                        <!-- <form method="POST" action="{{route('tournaments.teams.store', $tournament->id)}}"> -->
                            <form id="teamForm">
                                @csrf
                                <div class="form-group">
                                    <label for="field1">Team Code</label>
                                    <input type="text" class="form-control" id="field1" name="team_code"
                                           placeholder="eg. MI">
                                </div>
                                <div class="form-group">
                                    <label for="field1">Team Name</label>
                                    <input type="text" class="form-control" id="field1" name="team_name"
                                           placeholder="eg. Mumbai Indians">
                                </div>
                                <div class="form-group">
                                    <label for="field1">Team Title</label>
                                    <input type="text" class="form-control" id="field1" name="team_title"
                                           placeholder="eg .2">
                                </div>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-default btn-submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



            {{--					<form method="POST" action="{{route('teamFilter')}}">--}}
            {{--							@csrf--}}
            {{--							<div class="form-group col-md-4">--}}
            {{--									<select class="form-control" name="tournament_id" onchange="this.form.submit()">--}}
            {{--										<option value="">Tournament</option>--}}
            {{--										@foreach($tournament as $t)--}}
            {{--											<option value="{{$t->id}}">{{$t->tournament_name}}</option>--}}
            {{--										@endforeach--}}
            {{--									</select>--}}
            {{--							</div>--}}
            {{--					</form>--}}
            {{--					</div>--}}
            <div class="tables">
                <table class="table table-responsive-sm">
                    <thead>
                    <tr>
                        <th>Team_id</th>
                        <th>Team Code</th>
                        <th>Team Name</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($team as $t)
                        <tr>

                            <th scope="row">{{$t->id}}</th>
                            <td>{{$t->team_code}}</td>
                            <td>{{$t->team_name}}</td>
                            <td><a class="btn btn-dark btn-sm" href="/admin/teams/{{$t->id}}/players">Squad</a>
                            </td>
                            <td>
{{--                                <a class="btn btn-warning btn-sm"--}}
{{--                                   href="/admin/tournaments/{{$tournament->id}}/teams/{{$t->id}}"> <i class="cil-user"></i> </a>--}}
                                <a class="btn btn-success btn-sm"
                                   href="/admin/tournaments/{{$tournament->id}}/teams/{{$t->id}}/edit"> <i class="cil-color-border"></i> </a>
                                <form style="display:inline-block" method="POST"
                                      action="/admin/tournaments/{{$tournament->id}}/teams/{{$t->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"> <i class="cil-trash"></i> </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>
        </div>

        @endsection


        @section('script')

            <script>
                $('#addButton').on('click', function (e) {
                    $("#myModal").modal('show');
                });

                $('#teamForm').on('submit', function (e) {
                    e.preventDefault();

                    $.ajax({
                        type: "POST",
                        url: "{{route('tournaments.teams.store', $tournament->id)}}",
                        data: $(this).serialize(),
                        success: function (data) {
                            $("#myModal").modal('hide');
                            location.reload();
                        }
                    });
                });
            </script>

@endsection
