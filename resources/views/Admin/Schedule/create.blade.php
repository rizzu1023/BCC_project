

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
                    <h3 class="title1">Add Match</h3>
                    <div class="form-body">
                        <form method="POST" action="{{route('tournaments.schedules.store', $tournament->id)}}">
                            @csrf
                            <div class="form-group">
                                <label for="field1">Match No</label>
                                <input type="text" class="form-control" id="field1" name="match_no" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Team 1</label>
                                <select class="form-control" id="exampleFormControlSelect2" name="team1_id" required>
                                    <option value="">Select Team 1</option>
                                    @if($teams)
                                        @foreach($teams as $t)
                                            <option value="{{$t->id}}">{{$t->team_name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Team 2</label>
                                <select class="form-control" id="exampleFormControlSelect2" name="team2_id" required>
                                    <option value="">Select Team 2</option>
                                    @if($teams)
                                        @foreach($teams as $t)
                                            <option value="{{$t->id}}">{{$t->team_name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="field1">Time</label>
                                <input type="time" class="form-control" id="field1" name="times"  required>
                            </div>
                            <div class="form-group">
                                <label for="field1">Date</label>
                                <input type="date" class="form-control" id="field1" name="dates"  required>
                            </div>

                            <button type="submit" class="btn btn-block btn-success">Add Match</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
