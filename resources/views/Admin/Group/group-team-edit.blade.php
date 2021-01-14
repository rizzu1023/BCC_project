@extends('Admin.layouts.base')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Team Points Update</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/admin/Tournament">Tournaments</a></li>
                            <li class="breadcrumb-item "><a href="/admin/tournaments/{{$group->Tournament->id}}/groups">Groups </a></li>
                            <li class="breadcrumb-item "><a href="/admin/groups/{{$group->id}}/teams">Teams </a></li>
                            <li class="breadcrumb-item active ">Points</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="title1">{{ $team->Teams->team_name }}</h3>
                </div>
                @include('Admin.layouts.message')
                <div class="card-body">
                    <form class="needs-validation" novalidate="" action="/admin/groups/{{$group->id}}/teams/{{$team->team_id}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group row">
                                    <label class="col-sm-3" for="validationCustom02">Matches</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="validationCustom02" type="number"  required="" name="match" value="{{$team['match']}}">
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3" for="validationCustom03">Won</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="validationCustom03" type="number"  required="" name="won" value="{{$team['won']}}">
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3" for="validationCustom05">Lost</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="validationCustom05" type="number"  required="" name="lost" value="{{$team['lost']}}">
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3" for="validationCustom06">Draw</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="validationCustom06" type="number"  required="" name="draw" value="{{$team['draw']}}">
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3" for="validationCustom07">Points</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="validationCustom07" type="number"  required="" name="points" value="{{$team['points']}}">
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3" for="validationCustom08">NRR</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="validationCustom08" type="number" required="" name="nrr" value="{{$team['nrr']}}">
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <button class="btn btn-primary mt-3 float-right" type="submit">Update Points Table</button>
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


@endsection
