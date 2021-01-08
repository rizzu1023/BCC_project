
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
                        <form method="POST" action="/admin/player">
                            @csrf
                            <div class="form-group">
                                <label for="field1">Player Id</label>
                                <input type="text" class="form-control" id="field1" name="player_id" placeholder="eg. MR">
                            </div>
                            <div class="form-group">
                                <label for="field1">Player Name</label>
                                <input type="text" class="form-control" id="field1" name="player_name" placeholder="eg. Virat Kohli">
                            </div>
                            <div class="form-group">
                                <label for="field1">Player Role</label>
                                <input type="text" class="form-control" id="field1" name="player_role" placeholder="eg Batsman">
                            </div>

                            @include('Admin.layouts.errors')
                            <button type="submit" class="btn btn-success btn-block">Add Player</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
