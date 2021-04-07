
@extends('Admin.layouts.base')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Edit</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item active">Edit</li>
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
                    <div class="card-header">
                        @if($player->getFirstMedia('player-image'))
                            <img src="{{ $player->getFirstMedia('player-image')->getUrl('player-profile') }}">
                        @endif
                    </div>
                    <div class="form-body">
                        <form method="POST" action="/admin/player/{{$player['id']}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="field20">Player Image</label>
                                <input type="file" class="form-control" id="field20" name="player_image" >
                                <div>{{ $errors->first('player_image')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="field1">Player Id</label>
                                <input type="text" class="form-control" id="field1" name="player_id" value="{{$player['player_id']}}">
                                <div>{{ $errors->first('player_id')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="field1">First Name</label>
                                <input type="text" class="form-control" id="field1" name="first_name" value="{{$player['first_name']}}">
                                <div>{{ $errors->first('first_name')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="field1">Last Name</label>
                                <input type="text" class="form-control" id="field1" name="last_name" value="{{$player['last_name']}}">
                                <div>{{ $errors->first('last_name')}}</div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Player Role</label>
                                <select class="form-control" name="role" required="" >
                                    <option selected="" value="{{$player->role}}">{{$player->role}}</option>
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
                                    <option selected=""  value="{{$player->batting_style}}">{{$player->batting_style}}</option>
                                    <option>Right Hand Batsman</option>
                                    <option>Left Hand Batsman</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Bowling Style (optional)</label>
                                <select class="form-control" name="bowling_style" required="" >
                                    <option selected=""  value="{{$player->bowling_style}}">{{$player->bowling_style}}</option>
                                    <option>Right-arm fast</option>
                                    <option>Left-arm fast</option>
                                    <option>Right-arm legbreak</option>
                                    <option>Left-arm legbreak</option>
                                </select>
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
