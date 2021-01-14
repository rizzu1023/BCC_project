@extends('Admin.layouts.base')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Create Tournament</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/admin/Tournament">Tournaments</a></li>
                            <li class="breadcrumb-item active">Create</li>
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
                        <form method="POST" action="{{route('Tournament.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="field1">Tournament Name</label>
                                <input type="text" class="form-control" id="field1" name="tournament_name"
                                       placeholder="eg. CWC19" required>
                            </div>
                            <div class="form-group">
                                <label for="field1">Start Date</label>
                                <input type="date" class="form-control" id="field1" name="start_date" required>
                            </div>
                            <div class="form-group">
                                <label for="field1">End Date</label>
                                <input type="date" class="form-control" id="field1" name="end_date" required>
                            </div>
                            <button type="submit" class="btn btn-success btn-block">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
@section('js')

@endsection
