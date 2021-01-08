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
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="c-callout c-callout-info b-t-1 b-r-1 b-b-1">
                                    <small class="text-muted">Teams</small><br>
                                    <strong class="h4">{{$teams}}</strong>
                                </div>
                            </div><!--/.col-->
                            <div class="col-sm-3">
                                <div class="c-callout c-callout-danger b-t-1 b-r-1 b-b-1">
                                    <small class="text-muted">Players</small><br>
                                    <strong class="h4">{{$players}}</strong>
                                </div>
                            </div><!--/.col-->
                            <div class="col-sm-3">
                                <div class="c-callout c-callout-warning b-t-1 b-r-1 b-b-1">
                                    <small class="text-muted">Tournaments</small><br>
                                    <strong class="h4">{{$tournaments}}</strong>
                                </div>
                            </div><!--/.col-->
                            <div class="col-sm-3">
                                <div class="c-callout c-callout-success b-t-1 b-r-1 b-b-1">
                                    <small class="text-muted">Matches</small><br>
                                    <strong class="h4">{{$matches}}</strong>
                                </div>
                            </div><!--/.col-->

                        </div><!--/.row-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
@section('js')

@endsection
