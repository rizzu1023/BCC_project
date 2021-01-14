



{{--            <div class="modal" id="myModal" role="dialog">--}}
{{--                <div class="modal-dialog">--}}

{{--                    <!-- Modal content-->--}}
{{--                    <div class="modal-content">--}}
{{--                        <div class="modal-header">--}}
{{--                            <h3>Add Team</h3>--}}
{{--                        </div>--}}
{{--                        <div class="form-body">--}}
{{--                        <!-- <form method="POST" action="{{route('tournaments.teams.store', $tournament->id)}}"> -->--}}
{{--                            <form id="teamForm">--}}
{{--                                @csrf--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="field1">Team Code</label>--}}
{{--                                    <input type="text" class="form-control" id="field1" name="team_code"--}}
{{--                                           placeholder="eg. MI">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="field1">Team Name</label>--}}
{{--                                    <input type="text" class="form-control" id="field1" name="team_name"--}}
{{--                                           placeholder="eg. Mumbai Indians">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="field1">Team Title</label>--}}
{{--                                    <input type="number" class="form-control" id="field1" name="team_title"--}}
{{--                                           placeholder="eg .2">--}}
{{--                                </div>--}}
{{--                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>--}}
{{--                                <button type="submit" class="btn btn-default btn-submit">Submit</button>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}







{{--            <script>--}}
{{--                $('#addButton').on('click', function (e) {--}}
{{--                    $("#myModal").modal('show');--}}
{{--                });--}}

{{--                $('#teamForm').on('submit', function (e) {--}}
{{--                    e.preventDefault();--}}

{{--                    $.ajax({--}}
{{--                        type: "POST",--}}
{{--                        url: "{{route('tournaments.teams.store', $tournament->id)}}",--}}
{{--                        data: $(this).serialize(),--}}
{{--                        success: function (data) {--}}
{{--                            $("#myModal").modal('hide');--}}
{{--                            location.reload();--}}
{{--                        }--}}
{{--                    });--}}
{{--                });--}}
{{--            </script>--}}




        @extends('Admin.layouts.base')

        @section('content')
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <h3>Teams</h3>
                                <a class="btn btn-success btn-sm mr-2" href="{{ Route('teams.create') }}"><i class="cil-user-plus"></i> Add New Team</a>
                                @if($tournament)
                                <a class="btn btn-primary btn-sm " href="/admin/Tournament/{{$tournament->id}}"><i class="cil-user-plus"></i> Add Existing Team</a>
                                @endif
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin/dashboard"> <i data-feather="home"></i></a></li>
                                    <li class="breadcrumb-item active"><a href="/admin/Tournament">Tournaments</a></li>
                                    <li class="breadcrumb-item active">Teams</li>
                                    {{--              <li class="breadcrumb-item active">Product list</li>--}}
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            @include('Admin.layouts.message')
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
                                        @foreach($teams as $t)
                                            <tr>

                                                <th scope="row">{{$t->id}}</th>
                                                <td>{{$t->team_code}}</td>
                                                <td>{{$t->team_name}}</td>
                                                <td><a class="btn btn-dark btn-sm" href="/admin/teams/{{$t->id}}/players">Squad</a>
                                                </td>
                                                <td>
                                                                                    <a class="btn btn-warning btn-sm"
                                                                                       href="/admin/teams/{{$t->id}}"> Details </a>
                                                    <a class="btn btn-success btn-sm"
                                                       href="/admin/teams/{{$t->id}}/edit"> Edit </a>
                                                    @if($tournament)
                                                        <form style="display:inline-block" method="POST" action="{{route('Tournament_destroy_Team')}}">
                                                            @csrf
                                                            <input type="hidden" value="{{$t->id}}" name="team_id"/>
                                                            <input type="hidden" value="{{$tournament->id}}" name="tournament_id"/>
                                                            <button class="btn btn-danger btn-sm">Remove</button>
                                                        </form>
                                                    @else
                                                        <form style="display:inline-block" method="POST"
                                                              action="/admin/teams/{{$t->id}}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this team?')"> Delete </button>
                                                        </form>

                                                    @endif

                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>
                </div>
                <!-- Container-fluid Ends-->
            </div>
@endsection
@section('js')

@endsection
