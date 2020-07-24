@extends('Admin.layouts.base')

@section('content')
<div class="card">
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

@endsection
