@extends('Admin.layouts.base')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Group {{$group['group_name']}} Teams</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/admin/Tournament">Tournaments</a></li>
                            <li class="breadcrumb-item "><a href="/admin/tournaments/{{$group->Tournament->id}}/groups">Groups </a></li>
                            <li class="breadcrumb-item active ">Teams</li>
                            {{--              <li class="breadcrumb-item active">Product list</li>--}}
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary" type="button" href="/admin/groups/{{$group->id}}/teams/create"><i class="fa fa-plus"></i> Add Team</a>
                </div>
                <div class="card-block row">
                    <div class="col-sm-12 col-lg-12 col-xl-12">
                        <div class="table-responsive">
                            <table class="table table-styling" id="group-table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th class="w-25" scope="col">Team Code</th>
                                    <th scope="col">Team Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody id="group-table-body">
                                @foreach($group_teams as $t)
                                    <tr id="{{$t->id}}">
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td >{{$t->Teams->team_code}}</td>
                                        <td >{{$t->Teams->team_name}}</td>
                                        <td>
{{--                                            <a class="btn btn-sm btn-outline-primary" href="/admin/groups/{{$t->team_id}}/teams">Squad</a>--}}
{{--                                            <a class="btn btn-sm btn-outline-success" type="button"   data-toggle="modal" data-target="#exampleModalCenter" title="">Edit</a>--}}
                                            <form  id="team-form" method="post" style="display: inline-block" action="/admin/groups/{{$t->group_id}}/teams/{{$t->team_id}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger" type="submit">Remove</button>
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
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
