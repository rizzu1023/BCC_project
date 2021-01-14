@extends('Admin.layouts.base')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Add Existing Team</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/admin/Tournament">Tournaments</a></li>
                            <li class="breadcrumb-item "><a href="/admin/tournaments/{{$group->Tournament->id}}/groups">Groups </a></li>
                            <li class="breadcrumb-item "><a href="/admin/groups/{{$group->id}}/teams">Teams </a></li>
                            <li class="breadcrumb-item active ">Existing</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="title1">Select Team</h3>
                </div>
                <div class="card-body">
                    @include('Admin.layouts.message')


                    <form action="/admin/groups/{{$group->id}}/teams" method="post">
                        @csrf
                        <select class="form-control" id="exampleFormControlSelect2" name="team_id"
                                required onchange="this.form.submit()">
                            <option disabled selected>Add in Group</option>
                            @foreach($teams as $t)
                                <option
                                    value="{{$t->id}}">{{$t->team_name}}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
