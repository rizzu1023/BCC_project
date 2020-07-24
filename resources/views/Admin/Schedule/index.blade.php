@extends('Admin.layouts.base')

@section('content')


    <div class="card">
        <div class="card-header">
            <span class="title1">Schedule</span>
            <a style="float: right" class="btn btn-success btn-sm"
               href="{{route('tournaments.schedules.create',$tournament->id)}}"><i class="fa fa-plus"></i>Add</a>
        </div>
        <div class="card-body">

            @include('Admin.layouts.message')

            <div class="tables">
                <table class="table table-responsive-sm">
                    <thead>
                    <tr>
                        <th>Match No</th>
                        <th>Team 1</th>
                        <th>Vs</th>
                        <th>Team 2</th>
                        <th>Time</th>
                        <th>Date</th>
                        <th></th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($schedule as $s)
                        <tr>

                            <th scope="row">{{$s->match_no}}</th>
                            <td>{{$s->Teams1->team_code}}</td>
                            <td>Vs</td>
                            <td>{{$s->Teams2->team_code}}</td>
                            <td>{{$s->times}}</td>
                            <td>{{$s->dates}}</td>
                            <td>
                                <a class="btn btn-success btn-sm"
                                   href="/admin/tournaments/{{$tournament->id}}/schedules/{{$s->id}}/edit">Edit</a>
                                <form style="display:inline-block" method="POST"
                                      action="/admin/tournaments/{{$tournament->id}}/schedules/{{$s->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" value="{{$s->id}}" name="id">
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
