@extends('Admin.layouts.base')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Points Table</h3>

                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/admin/Tournament">Tournaments</a></li>
                            {{--                            <li class="breadcrumb-item "><a href="/admin/tournaments/{{$group->Tournament->id}}/groups">Groups </a></li>--}}
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
                    <h3 class="title1">Select Player</h3>
                </div>
                <div class="card-body">
                    @include('Admin.layouts.message')

                    <form method="post">
                        @csrf
                        <select class="form-control" id="match_id" name="match_id" onchange="new_function({{$tournament->id}})">
                            <option disabled selected>Select Match</option>
                            @foreach($matches as $m)
                                <option value="{{$m->match_id}}">
                                    {{$m->match_id}}. {{$m->MatchDetail[0]->Teams->team_name}} v/s {{$m->MatchDetail[1]->Teams->team_name}}
                                </option>
                            @endforeach
                        </select>
                    </form>


                    <div class="mt-5">
                        <form class="needs-validation" novalidate="" action="/admin/tournaments/{{$tournament->id}}/points-table/nrr" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-3" for="team_name1">Team Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="team_name1" type="text"
                                                     required="" name="team_name1">
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                        <input id="team1_id" type="hidden" name="team1_id">
                                    </div>
                                    <div class="row mt-2">
                                        <div class="form-group col-3">
                                            <label class="" for="run_scored1">Run Scored</label>
                                            <div class="">
                                                <input class="datepicker-here form-control" id="run_scored1"
                                                       type="number" data-language="en" required="" name="run_scored1">
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>
                                        </div>
                                        <div class="form-group col-3">
                                            <label class="" for="overs_played1">Overs Played</label>
                                            <div class="">
                                                <input class="form-control" id="over_played1" type="number"
                                                         required="" name="overs_played1">
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>
                                        </div>
                                        <div class="form-group col-3">
                                            <label class="co" for="total_overs1">Total Overs</label>
                                            <div class="co">
                                                <input class="form-control" id="total_overs1" type="number"
                                                         required="" name="total_overs1">
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>
                                        </div>


                                        <div class="form-group col-3">
                                            <label class="" for="all_out1">All Out</label>
                                            <div class="checkbox checkbox-dark m-square">
                                                <input id="all_out1" type="checkbox" name="all_out1">
                                                <label for="all_out1"></label>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-3" for="team_name2">Team Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="team_name2" type="text"
                                                   required="" name="team_name2">
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                        <input id="team2_id" type="hidden" name="team2_id">
                                    </div>
                                    <div class="row mt-2">
                                        <div class="form-group col-3">
                                            <label class="" for="run_scored2">Run Scored</label>
                                            <div class="">
                                                <input class="datepicker-here form-control" id="run_scored2"
                                                       type="number" data-language="en" required="" name="run_scored2">
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>
                                        </div>
                                        <div class="form-group col-3">
                                            <label class="" for="overs_played2">Overs Played</label>
                                            <div class="">
                                                <input class="form-control" id="over_played2" type="number"
                                                       required="" name="overs_played2">
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>
                                        </div>
                                        <div class="form-group col-3">
                                            <label class="co" for="total_overs2">Total Overs</label>
                                            <div class="co">
                                                <input class="form-control" id="total_overs2" type="number"
                                                       required="" name="total_overs2">
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>
                                        </div>


                                        <div class="form-group col-3">
                                            <label class="" for="all_out2">All Out</label>
                                            <div class="checkbox checkbox-dark m-square">
                                                <input id="all_out2" type="checkbox" name="all_out1">
                                                <label for="all_out2"></label>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>


                            <button class="btn btn-primary mt-3 float-right" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection


@section('js')
    <script src="{{asset('Assets/Admin/js/form-validation-custom.js')}}"></script>

    <script>
        function new_function(tournament_id,match_id) {

            var match_id = $('#match_id').val();
            $.ajax({
                type  : "POST",
                url   : "/admin/tournaments/"+ tournament_id +"/points-table/match_selected",
                data  : {
                    "_token": "{{ csrf_token() }}",
                    'match_id' : match_id,
                },
                success : function(data){
                    // alert(data.match_detail[0].score);
                    $('#total_overs1').val(data.match.overs);
                    $('#run_scored1').val(data.match_detail[0].score);
                    $('#team_name1').val(data.team1.team_name);
                    $('#team1_id').val(data.team1.id);
                    $('#over_played1').val(data.match_detail[0].over + "." + data.match_detail[0].overball);
                    if(data.all_out1){
                        $('#all_out1').attr('checked',true);
                    }

                    $('#total_overs2').val(data.match.overs);
                    $('#run_scored2').val(data.match_detail[1].score);
                    $('#team_name2').val(data.team2.team_name);
                    $('#team2_id').val(data.team2.id);
                    $('#over_played2').val(data.match_detail[1].over + "." + data.match_detail[1].overball);
                    if(data.all_out2){
                        $('#all_out2').attr('checked',true);
                    }
                },
                error  : function(data){
                    alert("Error");
                }
            });
        }
    </script>
@endsection
