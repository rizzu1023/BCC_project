
@extends('Admin.layouts.base')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Add New Player</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item active"><a href="{{ Route('teams.players.index',$team->id) }}">Squad</a></li>
                            <li class="breadcrumb-item active">Add new player</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    @include('Admin.layouts.message')
                </div>
                <div class="card-body">

                    <div class="form-body">
                        <form method="POST" action="/admin/teams/{{$team->id}}/players">
                            @csrf
                            <div class="form-group">
                                <label for="field1">Player Id</label>
                                <input type="text" class="form-control" id="field1" name="player_id" required>
                            </div>
                            <div class="form-group">
                                <label for="field1">First Name</label>
                                <input type="text" class="form-control" id="field1" name="first_name" required>
                            </div>
                            <div class="form-group">
                                <label for="field1">Last Name</label>
                                <input type="text" class="form-control" id="field1" name="last_name" required>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Player Role</label>
                                <select class="form-control" name="role_id" required="" >
                                    <option selected="" disabled="" value="">Choose...</option>
                                    @foreach($masterRoles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Batting Style</label>
                                <select class="form-control" name="batting_style_id" required="" >
                                    <option selected="" disabled="" value="">Choose...</option>
                                    @foreach($masterBattingStyles as $style)
                                        <option value="{{ $style->id }}">{{ $style->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Bowling Style (optional)</label>
                                <select class="form-control" name="bowling_style_id" required="" >
                                    <option selected="" disabled="" value="">Choose...</option>
                                    @foreach($masterBowlingStyles as $style)
                                        <option value="{{ $style->id }}">{{ $style->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="field1">Team</label>
                                <input type="text" class="form-control" id="field1" value="{{ $team->team_name }}"  name="team_id" placeholder="{{$team->team_name}}" readonly>
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
