

@extends('Admin.layouts.base')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Dashboard</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
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
                            <h1 class="title1 text-center">{{$Tournament['tournament_name']}}</h1>
                            <div class="col-md-12">

                                <div class="form-body">
                                    <form method="POST" action="{{route('Tournament_add_Team')}}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect2">Add Team</label>
                                            <select class="form-control" id="exampleFormControlSelect2" name="team_id">
                                                <option value="">Select Team</option>
                                                @foreach($Team as $t)
                                                    <option value="{{$t->id}}">{{$t->team_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <input type="hidden" name="tournament_id" value="{{$Tournament['id']}}"/>
                                        <button type="submit" class="btn btn-success">Add</button>
                                    </form>
                                </div>
                                <table class="table table-sm table-striped" style="margin-top:50px;">
                                    <thead>
                                    <tr class="bg-dark">
                                        <th scope="col">Team Code</th>
                                        <th scope="col">Team Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tournament_team as $t)
                                        <tr>
                                            <td>{{$t->team_code}}</td>
                                            <td>{{$t->team_name}}</td>
                                            <td><form style="display:inline-block" method="POST" action="{{route('Tournament_destroy_Team')}}">
                                                    @csrf
                                                    <input type="hidden" value="{{$t->id}}" name="team_id"/>
                                                    <input type="hidden" value="{{$Tournament['id']}}" name="tournament_id"/>
                                                    <button class="btn btn-danger btn-sm">Delete</button>
                                                </form></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
