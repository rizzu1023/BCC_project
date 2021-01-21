

        @extends('Admin.layouts.base')

        @section('content')
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <h3>Teams</h3>
                                <a class="btn btn-success btn-sm mr-2" href="/admin/tournaments/{{$tournament->id}}/teams/create"><i class="cil-user-plus"></i> Add New Team</a>
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
                                                                                       href="/admin/tournaments/{{$tournament->id}}/teams/{{$t->id}}"> Details </a>
                                                    <a class="btn btn-success btn-sm"
                                                       href="/admin/tournaments/{{$tournament->id}}/teams/{{$t->id}}/edit"> Edit </a>

                                                        <form style="display:inline-block" method="POST"
                                                              action="/admin/tournaments/{{$tournament->id}}/teams/{{$t->id}}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this team?')"> Delete </button>
                                                        </form>


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
