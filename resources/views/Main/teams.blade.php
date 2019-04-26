@extends('Main.layouts.base')


@section('content')

<div class="teams-area">
        <div class="container">
            <div class="row">

                <div class="col-md-3 mb-3 teams-area-wrapper">
                    <a href="{% url 'team-players' t_id=i.team_id %}">
                    <div class="teams-area-content text-center bg-1">
                        <h4>Mumbai Indians</h4>
                        <p>winner : 3 times</p>
                        <button>Home</button>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>


@endsection