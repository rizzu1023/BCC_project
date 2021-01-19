@extends('Admin.layouts.base')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Feedback</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">                                       <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/admin/feedbacks">Feedbacks</a></li>
                            <li class="breadcrumb-item">Show</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">

                        <div class="card-block row">
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                <div class="card-body">
                                    <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3" for="validationCustom01">Name</label>
                                                        <div class="col-sm-9">
                                                            <div>{{ $feedback['name'] }}</div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-3">Email</label>
                                                        <div class="col-sm-9">
                                                            <div>{{ $feedback['email'] }}</div>
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Subject</label>
                                                        <div class="col-sm-9">
                                                            <div>{{ $feedback['subject'] }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row ">
                                                        <label class="col-sm-3 col-form-label">Feedback</label>
                                                        <div class="col-sm-9">
                                                            <div>{{ $feedback['feedback'] }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3">Created At</label>
                                                        <div class="col-sm-9">
                                                            <div>{{ date('d-m-Y , h:i A',strtotime($feedback['created_at'])) }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3">Updated At</label>
                                                        <div class="col-sm-9">
                                                            <div>{{ date('d-m-Y , h:i A',strtotime($feedback['updated_at'])) }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
{{--                                            <a class="btn btn-primary mt-3 float-right" href="/admin/blogs/{{$feedback['id']}}/edit">Edit</a>--}}
                                            <a class="btn btn-success mt-3 float-right" href="/admin/feedbacks/">back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('js')



@endsection


