@extends('Admin.layouts.base')

@section('content')
    <div class="card">
        <div class="card-header">
            <span class="title1">Tournaments</span>

            <a style="float:right" class="btn btn-primary btn-success btn-sm" href="{{route('Tournament.create')}}"><i
                    class="fa fa-plus"></i>Create Tournament</a>
        </div>
        <div class="card-body">


    @include('Admin.layouts.message')


    <div class="tables">
        <!-- <div class="panel-body widget-shadow"> -->

        <table class="table table-responsive-sm">
            <thead>
            <tr>
                <th></th>
                <th>Tournament_id</th>
                <th>Tournament Name</th>
            </tr>
            </thead>
            <tbody>
            @foreach($Tournament as $t)
                <tr>
                    <td>
{{--                        <div class="dropdown">--}}
{{--                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"--}}
{{--                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"--}}
{{--                                    aria-expanded="false">--}}
{{--                                Manage--}}
{{--                            </button>--}}
{{--                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--                                --}}
{{--                                <a class="dropdown-item btn btn-sm btn-danger" href="{{route('PointsTable.index')}}"--}}
{{--                                   style="margin-bottom: 4px;display:block;border-radius: 0">Points Table</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <a class="btn btn-sm btn-dark"
                           href="/admin/tournaments/{{$t->id}}/teams"
                           >Teams</a>
                        <a class=" btn btn-sm btn-success "
                           href="/admin/tournaments/{{$t->id}}/schedules"
                           >Schedule</a>
                        <a class=" btn btn-sm btn-warning" href="{{route('LiveScore.index')}}"
                           >Live Score</a>


                    </td>
                    <th scope="row">{{$t->id}}</th>
                    <td>{{$t->tournament_name}}</td>
                    <td>
                    <!-- <a class="btn btn-warning btn-sm" href="/admin/Tournament/{{$t->id}}">Add Team</a> -->
                    </td>
                    <td>
                        <a class="btn btn-success btn-sm" href="/admin/Tournament/{{$t->id}}/edit">Edit</a>
                        <form style="display:inline-block" method="POST" action="/admin/Tournament/{{$t->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>


                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- </div> -->
    </div>

        </div>
    </div>


@endsection

@section('script')

{{--    <script>--}}
{{--        $('#dropdownMenuButton').on('click',function () {--}}
{{--                alert('asdfsa');--}}
{{--        });--}}
{{--    </script>--}}
    @endsection
