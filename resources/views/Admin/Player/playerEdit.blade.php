
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

                    <div class="form-body">
                        <form method="POST" action="/admin/player/{{$player['id']}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="field1">Player Id</label>
                                <input type="text" class="form-control" id="field1" name="player_id" value="{{$player['player_id']}}">
                                <div>{{ $errors->first('player_id')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="field1">Player Name</label>
                                <input type="text" class="form-control" id="field1" name="player_name" value="{{$player['player_name']}}">
                                <div>{{ $errors->first('player_name')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="field1">Player Role</label>
                                <input type="text" class="form-control" id="field1" name="player_role" value="{{$player['player_role']}}">
                                <div>{{ $errors->first('player_role')}}</div>
                            </div>

                            <button type="submit" class="btn btn-block btn-success">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
