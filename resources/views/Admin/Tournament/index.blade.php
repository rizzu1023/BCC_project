@extends('Admin.layouts.base')

@section('content')
    @include('Admin.layouts.message')
    <div class="mb-3">
{{--        <span class="title1">Tournaments</span>--}}

        <a class="btn btn-success btn-sm" href="{{route('Tournament.create')}}"><i
                class="fa fa-plus"></i> Create Tournament</a>
    </div>

    @foreach($Tournament as $t)
        <div class="card">
            <div class="card-header">
                <span>{{$loop->iteration}}</span>
                <div style="float: right">
                <a class="btn btn-success btn-sm" href="/admin/Tournament/{{$t->id}}/edit"> <i class="cil-color-border"></i> </a>
                <form style="display:inline-block" method="POST" action="/admin/Tournament/{{$t->id}}">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Are you sure you want to delete it?')" class="btn btn-danger btn-sm"> <i class="cil-trash"></i> </button>
                </form>
                </div>
            </div>
            <div class="card-body text-center">
                <div class="mb-5">
                    <h2>{{$t->tournament_name}}</h2>
                    <span>{{$t->start_date}} to</span><span> {{$t->end_date}}</span>
                </div>
                <a class="btn btn-secondary btn-block" href="/admin/tournaments/{{$t->id}}/teams">Teams</a>
                <a class="btn btn-secondary btn-block" href="/admin/tournaments/{{$t->id}}/schedules">Schedule</a>
                <a class="btn btn-secondary btn-block" href="/admin/tournaments/{{$t->id}}/results">Results</a>

            </div>
        </div>
    @endforeach


@endsection

@section('script')

{{--    <script>--}}
{{--        $('#dropdownMenuButton').on('click',function () {--}}
{{--                alert('asdfsa');--}}
{{--        });--}}
{{--    </script>--}}
    @endsection
