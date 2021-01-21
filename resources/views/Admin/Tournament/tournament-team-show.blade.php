

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
                    <div class="main-page">
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                                <button type="button" class="close fa fa-times text-danger" data-dismiss="alert" aria-label="Close">
                                    <i class="material-icons">close</i>
                                </button>
                            </div>
                        @endif
                        <h1 class="title1 text-center">{{$team['team_name']}}</h1>
                        <div class="">

                            <table class="table table-sm table-striped" style="margin-top:50px;">
                                <thead>
                                <tr class="bg-dark">
                                    <th scope="col">Tournament</th>
                                    <th scope="col">Position</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--						@foreach($tournament as $t)--}}
                                {{--						<tr>--}}
                                {{--							<td>{{$t->tournament_name}}</td>--}}
                                {{--							<td>{{$t->Teams->first()->pivot->position}}</td>--}}
                                {{--                            --}}
                                {{--						</tr>--}}
                                {{--                        @endforeach--}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
