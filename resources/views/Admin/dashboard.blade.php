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
            <div class="row">
                <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden b-r-0">
                        <div class="bg-primary b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center"><i data-feather="database"></i></div>
                                <div class="media-body"><span class="m-0">Teams</span>
                                    <h4 class="mb-0 counter">{{$teams}}</h4><i class="icon-bg"
                                                                               data-feather="database"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden b-r-0">
                        <div class="bg-secondary b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center"><i data-feather="user-plus"></i></div>
                                <div class="media-body"><span class="m-0">Players</span>
                                    <h4 class="mb-0 counter">{{$players}}</h4><i class="icon-bg"
                                                                                 data-feather="shopping-bag"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden b-r-0">
                        <div class="bg-success b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center"><i data-feather="message-circle"></i></div>
                                <div class="media-body"><span class="m-0">Tournaments</span>
                                    <h4 class="mb-0 counter">{{$tournaments}}</h4><i class="icon-bg"
                                                                                     data-feather="message-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden b-r-0">
                        <div class="bg-info b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center"><i data-feather="shopping-bag"></i></div>
                                <div class="media-body"><span class="m-0">Matches</span>
                                    <h4 class="mb-0 counter">{{$matches}}</h4><i class="icon-bg"
                                                                                 data-feather="user-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

{{--            <div class="card">--}}
{{--                <div class="blog-box blog-list row">--}}
{{--                    <div class="col-sm-5 text-center"><h4>Tournament Name</h4></div>--}}
{{--                    <div class="col-sm-7">--}}
{{--                        <div class="blog-details">--}}
{{--                            <div class="blog-date mt-2">05 January 2019 - 05 January 2019</div>--}}
{{--                            --}}{{--                        <h6>Java Language </h6>--}}
{{--                            <div class="blog-bottom-content">--}}
{{--                                <ul class="blog-social">--}}
{{--                                    <li>by: Paige Turner</li>--}}
{{--                                    <li>15 Hits</li>--}}
{{--                                </ul>--}}
{{--                                <hr>--}}
{{--                                <button class="btn btn-sm btn-primary">Details</button>--}}
{{--                                <button class="btn btn-sm btn-primary">Details</button>--}}
{{--                                <button class="btn btn-sm btn-primary">Details</button>--}}
{{--                                --}}{{--                            <p class="mt-0">inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
@section('js')

@endsection















