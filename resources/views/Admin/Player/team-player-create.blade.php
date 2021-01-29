
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
                                <select class="form-control" name="role" required="" >
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option>Batsman</option>
                                    <option>WK-Batsman</option>
                                    <option>Bowler</option>
                                    <option>Bowling Allrounder</option>
                                    <option>Batting Allrounder</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Batting Style</label>
                                <select class="form-control" name="batting_style" required="" >
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option>Right Hand Batsman</option>
                                    <option>Left Hand Batsman</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Bowling Style (optional)</label>
                                <select class="form-control" name="bowling_style" >
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option>Right-arm fast</option>
                                    <option>Left-arm fast</option>
                                    <option>Right-arm legbreak</option>
                                    <option>Left-arm legbreak</option>
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
