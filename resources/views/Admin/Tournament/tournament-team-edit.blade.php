

@extends('Admin.layouts.base')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Team</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item active">Team</li>
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
                    <div class="card-body">
                        <div class="form-body">
                            <form method="POST" action="/admin/tournaments/{{$tournament->id}}/teams/{{$team->id}}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="field1">Team Code</label>
                                    <input type="text" class="form-control" id="field1" name="team_code" value="{{$team['team_code']}}">
                                </div>
                                <div class="form-group">
                                    <label for="field1">Team Name</label>
                                    <input type="text" class="form-control" id="field1" name="team_name" value="{{$team['team_name']}}">
                                </div>
                                <button type="submit" class="btn btn-success btn-block">Update</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
@section('js')

@endsection
