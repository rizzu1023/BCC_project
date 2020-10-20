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
                        <th>No</th>
                        <th></th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Team 1</th>
                        <th>Vs</th>
                        <th>Team 2</th>
                        <th></th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($schedule as $s)
                        <tr>

                            <th scope="row">{{$s->match_no}}</th>

                            <td> @if($s->Match)
                                    <a class="btn btn-dark btn-sm" href="/admin/LiveUpdate/{{$s->id}}/{{$s->tournament_id}}">Score</a>
                                @else
                                    <a class="btn btn-warning btn-sm" href="/admin/StartScore/{{$s->id}}">Start</a>
                                @endif</td>
                            <td>{{ date('d-M-Y', strtotime($s->dates))}}</td>
                            <td>{{ date('h:m A', strtotime($s->dates))}}</td>
                            <td>{{$s->Teams1->team_code}}</td>
                            <td>Vs</td>
                            <td>{{$s->Teams2->team_code}}</td>

                            <td>
                                <a class="btn btn-success btn-sm"
                                   href="/admin/tournaments/{{$tournament->id}}/schedules/{{$s->id}}/edit">Edit</a>
                                <form style="display:inline-block" method="POST"
                                      action="/admin/tournaments/{{$tournament->id}}/schedules/{{$s->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" value="{{$s->id}}" name="id">
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete it?')">Delete</button>


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
